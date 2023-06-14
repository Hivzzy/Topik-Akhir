<?php

namespace App\Http\Controllers;

use App\Models\ItemPesananModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    public function displayPenjualan()
    {
        return view('pages.penjualan.PenjualanView', [
            'title' => 'Data Penjualan',
            'active' => 'sell-item',
        ]);
    }

    public function getGrafikPenjualan()
    {
        $data = PenjualanController::getInfoPenjualan();
        // dd($data);
        return view('pages.penjualan.GrafikView', [
            'title' => 'Grafik Penjualan',
            'active' => 'sell-item',
            'data' => $data,
        ]);
    }

    public function getDataPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir)
    {
        $penjualan_periode = PenjualanController::getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir);
        $jumlah_pesanan = $penjualan_periode[0];
        $total_transaksi = $penjualan_periode[1];

        return view('pages.penjualan.TabelPenjualanPeriode')->with([
            'pesanan' => $jumlah_pesanan,
            'transaksi' => $total_transaksi,
        ]);
    }

    public function getDataPenjualanBulanan($tanggal)
    {
        $penjualan_bulanan = PenjualanController::getPenjualanBulanan($tanggal);
        $jumlah_pesanan = $penjualan_bulanan[0];
        $total_transaksi = $penjualan_bulanan[1];

        return view('pages.penjualan.TabelPenjualanBulanan')->with([
            'pesanan' => $jumlah_pesanan,
            'transaksi' => $total_transaksi,
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

    public function getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir)
    {
        $tanggal_transaksi = [];

        $penjualan = new PesananModel();
        $penjualan_periode = $penjualan->getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir);

        foreach ($penjualan_periode as $value) {
            array_push($tanggal_transaksi, $value->tanggal_transaksi);
        }

        $total_transaksi = $penjualan->getTotalTransaksi($tanggal_transaksi);

        return [$penjualan_periode, $total_transaksi];
    }

    public function getPenjualanBulanan($tanggal)
    {
        $bulan = date('m', strtotime($tanggal));
        $tahun = date('Y', strtotime($tanggal));
        $tanggal_transaksi = [];

        $penjualan = new PesananModel();
        $penjualan_bulanan = $penjualan->getPenjualanBulanan($bulan, $tahun);

        foreach ($penjualan_bulanan as $value) {
            array_push($tanggal_transaksi, $value->tanggal_transaksi);
        }

        $total_transaksi = $penjualan->getTotalTransaksi($tanggal_transaksi);

        return [$penjualan_bulanan, $total_transaksi];
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

    public function getInfoPenjualan()
    {
        $to_date = date('Y-m-d', strtotime(Carbon::today()));
        $from_date = date('Y-m-d', strtotime(Carbon::today()->subDays(30)));
        
        $penjualan = new PesananModel();
        $id_pesanan = $penjualan->getDataPenjualan($from_date, $to_date);
        $pelanggan = $penjualan->getPelangganPalingSeringPesan($id_pesanan);
        $kelurahan = $penjualan->getKelurahanPalingBanyakPesanan($id_pesanan);
        $kecamatan = $penjualan->getKecamatanPalingBanyakPesanan($id_pesanan);

        return [
            'pelanggan' => $pelanggan,
            'kelurahan' => $kelurahan,
            'kecamatan' => $kecamatan,
        ];
    }

    public function getDataPenjualan()
    {
        $to_date = date('Y-m-d', strtotime(Carbon::today()));
        $from_date = date('Y-m-d', strtotime(Carbon::today()->subDays(30)));

        $penjualan = new PesananModel();
        $id_pesanan = $penjualan->getDataPenjualan($from_date, $to_date);
        $wilayah_penjualan = $penjualan->getWilayahPenjualan($id_pesanan);
        $produk_kg = $penjualan->getItemProdukKg($id_pesanan);
        $produk_bungkus = $penjualan->getItemProdukBungkus($id_pesanan);
        $produk_bongkol = $penjualan->getItemProdukBongkol($id_pesanan);
        $produk_tray = $penjualan->getItemProdukTray($id_pesanan);
        $produk_ikat = $penjualan->getItemProdukIkat($id_pesanan);
        $produk_butir = $penjualan->getItemProdukButir($id_pesanan);
        $produk_pack = $penjualan->getItemProdukPack($id_pesanan);
        $produk_paket = $penjualan->getItemProdukPaket($id_pesanan);
        $produk_pasang = $penjualan->getItemProdukPasang($id_pesanan);

        return response()->json([
            'wilayah' => $wilayah_penjualan,
            'produk_kg' => $produk_kg,
            'produk_bungkus' => $produk_bungkus,
            'produk_bongkol' => $produk_bongkol,
            'produk_tray' => $produk_tray,
            'produk_ikat' => $produk_ikat,
            'produk_butir' => $produk_butir,
            'produk_pack' => $produk_pack,
            'produk_paket' => $produk_paket,
            'produk_pasang' => $produk_pasang,
        ]);
    }

    public function createLaporanPenjualanHarian($tanggal)
    {
        $data_penjualan = PenjualanController::getPenjualanHarian($tanggal);
        $item_penjualan = $data_penjualan[1];

        // Ambil gambar
        $path = base_path('public/assets/img/logo_bostani.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pict = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = FacadePdf::loadView('pages.penjualan.LaporanPenjualanHarian', compact(['tanggal', 'item_penjualan', 'pict']));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }

    public function createLaporanPenjualanBulanan($tanggal)
    {
        $data_penjualan = PenjualanController::getPenjualanBulanan($tanggal);
        $pesanan = $data_penjualan[0];
        $transaksi = $data_penjualan[1];

        // Ambil gambar
        $path = base_path('public/assets/img/logo_bostani.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pict = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = FacadePdf::loadView('pages.penjualan.LaporanPenjualanBulanan', compact(['pesanan', 'transaksi', 'tanggal', 'pict']));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }

    public function createLaporanPenjualanPeriode($tanggal_awal, $tanggal_akhir)
    {
        $data_penjualan = PenjualanController::getPenjualanPeriodeWaktu($tanggal_awal, $tanggal_akhir);
        $pesanan = $data_penjualan[0];
        $transaksi = $data_penjualan[1];

        // Ambil gambar
        $path = base_path('public/assets/img/logo_bostani.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pict = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $pdf = FacadePdf::loadView('pages.penjualan.LaporanPenjualanPeriode', compact(['pesanan', 'transaksi', 'tanggal_awal', 'tanggal_akhir', 'pict']));
        return $pdf->setPaper('a4', 'landscape')->stream();
    }
}
