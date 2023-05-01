<?php

namespace App\Http\Controllers;

use App\Models\SubKategoriModel;
use Illuminate\Http\Request;

class SubKategoriController extends Controller
{
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
