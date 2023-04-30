<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function displayProduk()
    {
        $title = 'Hapus Produk!';
        $text = "Anda yakin ingin menghapus produk?";
        confirmDelete($title, $text);

        $produk = new ProdukModel();
        $data = $produk->getProduk();

        return view('pages.produk.ProdukView', [
            'title' => 'Data Prdouk',
            'active' => 'product',
            'produks' => $data,
        ]);
    }

    public function displayTambahProduk()
    {
        return view('pages.produk.TambahProdukView', [
            'title' => 'Tambah Prdouk',
            'active' => 'product'
        ]);
    }

    public function displayEditProduk($id)
    {
        return view('pages.produk.EditProdukView', [
            'title' => 'Edit Prdouk',
            'active' => 'product'
        ]);
    }
}
