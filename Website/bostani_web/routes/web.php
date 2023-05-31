<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubKategoriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahController;
use App\Models\SubKategoriModel;
use GuzzleHttp\Promise\Create;
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

Route::redirect('/', 'login');

// Route::get('/', function() {
//     return view('welcome');
// });

Route::get('/login', [AuthController::class, 'userLogin'])->name('login');
Route::post('/user/login', [AuthController::class, 'authenticate']);

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/user/logout', [AuthController::class, 'logout']);

    //Produk
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::get('/tambah-produk', [ProdukController::class, 'displayTambahProduk']);
    Route::post('produk/tambah', [ProdukController::class, 'createProduk']);
    Route::get('/produk/edit/{id}', [ProdukController::class, 'displayEditProduk']);
    Route::post('/produk/edit/{id}', [ProdukController::class, 'updateProduk']);
    Route::delete('/produk/hapus/{id}', [ProdukController::class, 'deleteProduk']);
    
    //Kategori
    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori/tambah', [KategoriController::class, 'createKategori']);
    Route::post('/kategori/edit/{id}', [KategoriController::class, 'updateKategori']);
    Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'deleteKategori']);
    
    
    //Sub Kategori
    Route::get('/subkategori/{id}', [SubKategoriController::class, 'index']);
    Route::get('/subkategori/get/{id}', [SubKategoriController::class, 'getSubKategori']);
    Route::post('/subkategori/tambah', [SubKategoriController::class, 'createSubKategori']);
    Route::post('/subkategori/edit/{id}', [SubKategoriController::class, 'updateSubKategori']);
    Route::delete('/subkategori/hapus/{id}', [SubKategoriController::class, 'deleteSubKategori']);
    
    // Penjualan
    Route::get('/penjualan', [PenjualanController::class, 'displayPenjualan']);
    Route::get('/grafik-penjualan', [PenjualanController::class, 'displayGrafikPenjualan']);
    
    // Pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index']);
    Route::get('/tambah-pelanggan', [PelangganController::class, 'displayTambahPelanggan']);
    Route::post('/pelanggan/tambah', [PelangganController::class, 'createPelanggan']);
    Route::get('/pelanggan/hapus/{id}', [PelangganController::class, 'deletePelanggan']);
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'displayEditPelanggan']);
    Route::delete('/pelanggan/hapus/{id}',[PelangganController::class, 'deletePelanggan']);

    //Wilayah
    Route::get('/kecamatan/get/{id}', [WilayahController::class, 'getKecamatan']);
    Route::get('/kelurahan/get/{id}', [WilayahController::class, 'getKelurahan']);
    
    // User
    Route::get('/kelola-akun', [UserController::class, 'index']);
    Route::get('/tambah-akun', [UserController::class, 'displayTambahUser']);
    Route::post('/akun/tambah', [UserController::class, 'createUser']);
    Route::get('/akun/edit/{id}', [UserController::class, 'displayEditUser']);
    Route::post('/akun/edit/{id}', [UserController::class, 'updateUser']);
    Route::delete('/akun/hapus/{id}', [UserController::class, 'deleteUser']);
    Route::get('/role', [RoleController::class, 'displayRole']);
});
