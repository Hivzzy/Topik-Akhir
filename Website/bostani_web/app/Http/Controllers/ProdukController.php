<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'satuan' => 'required',
            'kategori' => 'required',
            'sub_kategori' => '',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $produk = new ProdukModel();
        $add_produk = $produk->createProduk($validatedData);

        if ($add_produk) {
            Alert::success('Success', $validatedData['nama_produk'] . ' berhasil ditambahkan');
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
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'satuan' => 'required',
            'kategori' => 'required',
            'sub_kategori' => '',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        $produk = new ProdukModel();
        $edit_produk = $produk->updateProduk($validatedData, $id);

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
}
