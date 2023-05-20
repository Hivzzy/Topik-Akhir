<?php

namespace App\Http\Controllers;

use App\Models\KecamatanModel;
use App\Models\KelurahanModel;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function getKecamatan($id_kota)
    {
        $kecamatan = new KecamatanModel();
        
        if ($id_kota != null) {
            $data = $kecamatan->getKecamatan($id_kota);
        } else {
            $data = '';
        }
        return json_encode($data);
    }

    public function getKelurahan($id_kecamatan)
    {
        $kelurahan = new KelurahanModel();
        
        if ($id_kecamatan != null) {
            $data = $kelurahan->getKelurahan($id_kecamatan);
        } else {
            $data = '';
        }
        return json_encode($data);
    }
}
