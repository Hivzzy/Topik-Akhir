<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\SubKategoriModel;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
    public function index($id)
    {
        $title = 'Hapus Sub Kategori!';
        $text = "Anda yakin ingin menghapus sub kategori?";
        confirmDelete($title, $text);

        $sub_kategori = new SubKategoriModel();
        $data = $sub_kategori->getSubKategori($id);

        return view('pages.subkategori.SubKategoriView', [
            'title' => 'Data Sub Kategori',
            'active' => 'category',
            'category' => KategoriModel::where('id', $id)->first(),
            'sub_categories' => $data,
        ]);
    }

    public function getSubKategori($id_kategori)
    {
        $sub_kategori = new SubKategoriModel();
        
        if ($id_kategori != null) {
            $data = $sub_kategori->getSubKategori($id_kategori);
        } else {
            $data = '';
        }
        return json_encode($data);
    }
}
