<?php

namespace App\Http\Controllers;

use App\Models\ItemPesananModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function displayPenjualan()
    {
        return view('pages.penjualan.PenjualanView', [
            'title' => 'Data Penjualan',
            'active' => 'sell-item',
        ]);
    }

    public function getDataPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir)
    {
        $penjualan = new PesananModel();
        $penjualan_periode = $penjualan->getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir);

        return view('pages.penjualan.TabelPenjualanPeriode')->with([
            'penjualan_periode' => $penjualan_periode,
        ]);
    }

    public function getDataPenjualanBulanan($tanggal)
    {
        $bulan = date('m', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        
        $penjualan = new PesananModel();
        $penjualan_bulanan = $penjualan->getPenjualanBulanan($bulan, $tahun);
        
        return view('pages.penjualan.TabelPenjualanBulanan')->with([
            'penjualan_bulanan' => $penjualan_bulanan,
        ]);
    }

    public function getDataPenjualanHarian($tanggal)
    {
        $penjualan_harian = PenjualanController::getPenjualanHarian($tanggal);

        return view('pages.penjualan.TabelPenjualanHarian')->with([
            'penjualan_harian' => $penjualan_harian[0],
            'item_penjualan' => $penjualan_harian[1],
        ]);
    }

    public function getPenjualanHarian($tanggal)
    {
        $array_id = [];

        $penjualan = new PesananModel();
        $penjualan_harian = $penjualan->getPenjualanHarian(date('Y-m-d', strtotime($tanggal)));

        foreach ($penjualan_harian as $value) {
            array_push($array_id, $value->id);
        }

        $item = new ItemPesananModel();
        $item_penjualan = $item->getItemBelanja($array_id);

        return [$penjualan_harian, $item_penjualan];
    }

    public function displayGrafikPenjualan()
    {
        return view('pages.penjualan.GrafikView', [
            'title' => 'Grafik Penjualan',
            'active' => 'sell-item'
        ]);
    }
}
