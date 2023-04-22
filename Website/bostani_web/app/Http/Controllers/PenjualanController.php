<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function displayPenjualan()
    {
        return view('pages.penjualan.PenjualanView', [
            'title' => 'Data Penjualan',
            'active' => 'sell-item'
        ]);
    }

    public function displayGrafikPenjualan() {
        return view('pages.penjualan.GrafikView', [
            'title' => 'Grafik Penjualan',
            'active' => 'sell-item'
        ]);
    }
}
