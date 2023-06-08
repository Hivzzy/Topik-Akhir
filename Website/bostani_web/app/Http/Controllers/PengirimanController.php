<?php

namespace App\Http\Controllers;

use App\Models\PengirimanModel;
use App\Models\DriversModel;
use App\Models\PesananModel;
use App\Models\PelangganModel;
use App\Models\StatusPengirimanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengirimanController extends Controller
{
    public function index()
    {
        $title = 'Hapus data Pengiriman!';
        $text = "Anda yakin ingin menghapus data pengiriman?";
        confirmDelete($title, $text);

        $pengiriman = new PengirimanModel();
        $pengirimanTotal = PengirimanModel::with('pesanans')->get();
        $jumlahTotalOngkir = PengirimanModel::with(['pesanans' => function ($query) {
            $query->select('delivery_id', DB::raw('SUM(shipping_cost) as total_shipping_cost'))
                ->groupBy('delivery_id');
        }])
        ->get();

        $jumlahPesanan = 0;
        foreach ($pengirimanTotal as $item) {
            $jumlahPesanan += $item->pesanans->count();
        }

        return view('pages.pengiriman.PengirimanView', [
            'title' => 'Data Pengiriman',
            'active' => 'deliveries',
            'pengirimans' => $pengiriman->getPengiriman(),
            'jumlahPesanan' => $jumlahPesanan,
            'jumlahOngkir' => $jumlahTotalOngkir,
        ]);
    }

    public function getDetailPengiriman($id_pengiriman)
    {
        $detail_pengiriman = new PengirimanModel();
        $jumlahTotalOngkir = PengirimanModel::with(['pesanans' => function ($query) {
            $query->select('delivery_id', DB::raw('SUM(shipping_cost) as total_shipping_cost'))
                ->groupBy('delivery_id');
        }])
        ->find($id_pengiriman);


        return view('pages.pengiriman.DetailPengirimanView', [
            'title' => 'Detail Pengiriman',
            'active' => 'deliveries',
            'detail_pengiriman' => $detail_pengiriman->getDetailPengiriman($id_pengiriman),
            'jumlahTotalOngkir'=>$jumlahTotalOngkir,
            'delivery_status' => StatusPengirimanModel::all(),
        ]);
    }
}
?>
