<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    public function index()
    {
        $title = 'Delete User!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('pages.pelanggan.PelangganView', [
            'title' => 'Data Pelanggan',
            'active' => 'customer'
        ]);
    }

    public function displayTambahPelanggan()
    {
        return view('pages.pelanggan.TambahPelangganView', [
            'title' => 'Tambah Pelanggan',
            'active' => 'customer'
        ]);
    }

    public function deletePelanggan($id)
    {
        Alert::success('Success Title', 'Success Message');
        return redirect()->back();
    }
}
