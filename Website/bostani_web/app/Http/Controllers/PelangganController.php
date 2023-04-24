<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function displayPelanggan() {
        return view('pages.pelanggan.PelangganView', [
            'title' => 'Data Pelanggan',
            'active' => 'customer'
        ]);
    }

    public function displayTambahPelanggan() {
        return view('pages.pelanggan.TambahPelangganView', [
            'title' => 'Tambah Pelanggan',
            'active' => 'customer'
        ]);
    }
}
