<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $title = 'Hapus Kategori!';
        $text = "Anda yakin ingin menghapus kategori?";
        confirmDelete($title, $text);

        // $kategori = new KategoriModel();
        // $data = $kategori->getKategori();

        return view('pages.kategori.KategoriView', [
            'title' => 'Data Kategori',
            'active' => 'category',
            'categories' => KategoriModel::all(),
        ]);
    }
}
