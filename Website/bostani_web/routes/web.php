<?php

use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

//Produk
Route::get('/produk', [ProdukController::class, 'displayProduk']);
Route::get('/tambah-produk', [ProdukController::class, 'displayTambahProduk']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'displayEditProduk']);

// Penjualan
Route::get('/penjualan', [PenjualanController::class, 'displayPenjualan']);
Route::get('/grafik-penjualan', [PenjualanController::class, 'displayGrafikPenjualan']);

// Pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/tambah-pelanggan', [PelangganController::class, 'displayTambahPelanggan']);
Route::get('/pelanggan/delete/{id}', [PelangganController::class, 'deletePelanggan']);
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'displayEditPelanggan']);

// User
Route::get('/kelola-akun', [UserController::class, 'index']);
Route::get('/tambah-akun', [UserController::class, 'displayTambahUser']);
Route::post('/akun/tambah', [UserController::class, 'createUser']);
Route::get('/akun/edit/{id}', [UserController::class, 'displayEditUser']);
Route::post('/akun/edit/{id}', [UserController::class, 'updateUser']);
Route::delete('/akun/hapus/{id}', [UserController::class, 'deleteUser']);
Route::get('/role', [RoleController::class, 'displayRole']);