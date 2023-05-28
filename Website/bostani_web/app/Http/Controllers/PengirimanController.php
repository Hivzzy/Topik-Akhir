<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
        return view('pages.pengiriman.PengirimanView', [
            'title' => 'Data Pengiriman',
            'active' => 'send-item',
        ]);
    }
}
