<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function displayProduk()
    {
        return view('pages.produk.ProdukView', [
            'title' => 'Data Prdouk',
            'active' => 'product'
        ]);
    }

    public function displayTambahProduk()
    {
        return view('pages.produk.TambahProdukView', [
            'title' => 'Tambah Prdouk',
            'active' => 'product'
        ]);
    }
}
