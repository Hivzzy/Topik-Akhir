<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserConstroller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'dashboard', 301);

Route::get('/dashboard', function () {
    return view('pages.DashboardView', [
        'title' => 'Dashboard',
        'active' => 'dashboard'
    ]);
});

// Penjualan
Route::get('/penjualan', [PenjualanController::class, 'displayPenjualan']);
Route::get('/grafik-penjualan', [PenjualanController::class, 'displayGrafikPenjualan']);

// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'displayPelanggan']);
Route::get('/tambah-pelanggan', [PelangganController::class, 'displayTambahPelanggan']);

// User
Route::get('/kelola-akun', [UserConstroller::class, 'displayUser']);
Route::get('/tambah-akun', [UserConstroller::class, 'displayTambahUser']);