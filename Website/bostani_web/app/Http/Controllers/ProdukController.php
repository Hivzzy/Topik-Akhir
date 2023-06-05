<?php

namespace App\Http\Controllers;

use App\Models\UnitModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\SubKategoriModel;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $title = 'Hapus Produk!';
        $text = "Anda yakin ingin menghapus produk?";
        confirmDelete($title, $text);

        $produk = new ProdukModel();
        $data = $produk->getProduk();

        return view('pages.produk.ProdukView', [
            'title' => 'Data Produk',
            'active' => 'product',
            'produks' => $data,
        ]);
    }

    public function getProdukById(Request $request)
    {
        $produk = new ProdukModel();
        $data = $produk->getProdukById($request->id);
        return response()->json($data);
    }

    public function displayTambahProduk()
    {
        return view('pages.produk.TambahProdukView', [
            'title' => 'Tambah Produk',
            'active' => 'product',
            'categories' => KategoriModel::all(),
            'units' => UnitModel::all(),
        ]);
    }

    public function createProduk(Request $request)
    {
        if ($request['sub_category'] == '') {
            $request['sub_category'] = NULL;
        }

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|unique:products',
            'unit' => 'required',
            'category' => 'required',
            'sub_category' => '',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'size' => 'required',
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back()->withInput($request->all());
        }

        $produk = new ProdukModel();
        $add_produk = $produk->createProduk($request->all());

        if ($add_produk) {
            Alert::success('Success', $request->all()['product_name'] . ' berhasil ditambahkan');
            return redirect('/produk');
        } else {
            Alert::error('Error', 'User gagal ditambahkan');
            return redirect()->back();
        }
    }

    public function displayEditProduk($id)
    {
        $produk = new ProdukModel();
        $data = $produk->getDetailProduk($id);

        return view('pages.produk.EditProdukView', [
            'title' => 'Edit Produk',
            'active' => 'product',
            'produk' => $data,
            'categories' => KategoriModel::all(),
            'units' => UnitModel::all(),
        ]);
    }

    public function updateProduk(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'unit' => 'required',
            'category' => 'required',
            'sub_category' => '',
            'purchase_price' => 'required',
            'selling_price' => 'required',
            'size' => 'required',
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        $produk = new ProdukModel();
        $edit_produk = $produk->updateProduk($request->all(), $id);

        if ($edit_produk) {
            Alert::success('Success', 'Data produk berhasil diperbarui');
            return redirect('/produk');
        } else {
            Alert::error('Error', 'Data produk gagal diperbarui');
            return redirect()->back();
        }
    }

    public function deleteProduk($id)
    {
        $produk = new ProdukModel();
        $delete_produk = $produk->deleteProduk($id);

        if ($delete_produk) {
            Alert::success('Success', 'Data produk berhasil dihapus');
            return redirect('/produk');
        } else {
            Alert::error('Error', 'Data produk gagal dihapus');
            return redirect()->back();
        }
    }

    public function createKatalog()
    {
        $kategori = new KategoriModel();
        $produk = new ProdukModel();
        $data_kategori = $kategori->getKategori();
        $data_subkategori = SubKategoriModel::all();
        $data_produk = $produk->getProduk();

        $kategori_id = KategoriModel::select('categories.id AS id_kategori')
            ->join('sub_categories', 'sub_categories.category_id', '=', 'categories.id')
            ->distinct()
            ->orderBy('categories.id', 'ASC')
            ->get();

        $info_kategori = array();
        foreach ($kategori_id as $value) {
            $info_kategori[$value['id_kategori']] = $value;
        }

        // dd($info_kategori);

        $sub_kategori_id = SubKategoriModel::select('sub_categories.id AS id_sub_kategori')
            ->join('products', 'products.sub_category_id', '=', 'sub_categories.id')
            ->distinct()
            ->get();

        $info_sub_kategori = array();
        foreach ($sub_kategori_id as $value) {
            $info_sub_kategori[$value['id_sub_kategori']] = $value;
        }

        // dd($info_sub_kategori);

        $pdf = Pdf::loadView('pages.produk.ExportProdukPdf', compact(['data_produk', 'data_kategori', 'data_subkategori', 'info_kategori', 'info_sub_kategori']));
        return $pdf->stream('invoice.pdf');
    }
}
