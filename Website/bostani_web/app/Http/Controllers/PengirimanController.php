<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use App\Models\DriverModel;
use App\Models\PesananModel;
use App\Models\StatusPengirimanModel;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        $title = 'Hapus data Pengiriman!';
        $text = "Anda yakin ingin menghapus data pengiriman?";
        confirmDelete($title, $text);

        $pengiriman = new PengirimanModel();
        $data = $pengiriman->getPengiriman();

        return view('pages.pengiriman.PengirimanView', [
            'title' => 'Data Pengiriman',
            'active' => 'deliveries',
            'pengirimans' => $data,
        ]);
    }
}
?>
