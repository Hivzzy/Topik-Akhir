<?php

namespace App\Http\Controllers;

use App\Models\ItemPesananModel;
use App\Models\KotaModel;
use App\Models\PelangganModel;
use App\Models\PesananModel;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $title = 'Hapus Pesanan!';
        $text = "Anda yakin ingin menghapus data pesanan?";
        confirmDelete($title, $text);

        return view('pages.pesanan.PesananView', [
            'title' => 'Data Pesanan',
            'active' => 'order',
            'orders' => PesananModel::all(),
        ]);
    }

    public function displayTambahPesanan()
    {
        return view('pages.pesanan.TambahPesananView', [
            'title' => 'Tambah Pesanan',
            'active' => 'order',
            'customers' => PelangganModel::all(),
            'cities' => KotaModel::all(),
        ]);
    }

    public function getDetailPesanan($id_pesanan)
    {
        $detail_pesanan = new PesananModel();
        $item_pesanan = new ItemPesananModel();

        return view('pages.pesanan.DetailPesananView', [
            'title' => 'Detail Pesanan',
            'active' => 'order',
            'order' => $detail_pesanan->getDetailPesanan($id_pesanan),
            'items' => $item_pesanan->getItemPesanan($id_pesanan),
        ]);
    }

    public function getListBelanja()
    {
        $belanja = new PesananModel();
        $item_belanja = new ItemPesananModel();
        $id_pesanan = [];
        $tanggal_kirim = now();  
        // $tanggal_kirim = '2023/06/16';

        $dt_belanja = $belanja->getListBelanja($tanggal_kirim);
        foreach ($dt_belanja as $dt) {
            array_push($id_pesanan, $dt->id);
        }

        $data = $item_belanja->getItemBelanja($id_pesanan);
        $sum_item = $item_belanja->getTotalItem($id_pesanan);

        return view('pages.belanja.BelanjaView', [
            'title' => 'Daftar Belanja',
            'active' => 'shop-item',
            'belanja' => $dt_belanja,
            'items' => $data,
            'list_item' => $sum_item, 
        ]);
    }
}
