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
        $pengiriman = PengirimanModel::with('pesanans.customers.kelurahan.kecamatan')->get();
        $pengirimanStatus = PengirimanModel::with('status_pengiriman')->get();

        return view('pages.pengiriman.PengirimanView', [
            'title' => 'Data Pengiriman',
            'active' => 'deliveries',
            'pengirimans' => $pengiriman,
            'pengirimanStatus'=> $pengirimanStatus,
        ]);
    }


   public function getDetailPengiriman($id_pengiriman)
    {
        $detail_pengiriman = new PengirimanModel();
        $detail_pengiriman = PengirimanModel::with('pesanans.customers.kelurahan.kecamatan.kota')->findOrFail($id_pengiriman);

        return view('pages.pengiriman.DetailPengirimanView', [
            'title' => 'Detail Pengiriman',
            'active' => 'deliveries',
            'detail_pengiriman' => $detail_pengiriman,
            'delivery_status' => StatusPengirimanModel::all(),
        ]);
    }
}
?>
