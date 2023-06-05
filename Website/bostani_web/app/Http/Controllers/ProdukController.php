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

    public function viewPdf()
    {
        $produk = new ProdukModel();
        $kategori = new KategoriModel();

        $data_produk = $produk->getProduk();
        $data_kategori = $kategori->getKategori();
        $data_subkategori = SubKategoriModel::all();
        
        dd( $data_kategori);
        $pdf = Pdf::loadView('pages.produk.ExportProdukPdf', compact(['data_produk', 'data_kategori', 'data_subkategori']));
        return $pdf->stream('invoice.pdf');
    }
}
