<?php

use App\Mail\SendEmail;
use GuzzleHttp\Promise\Create;
use App\Models\SubKategoriModel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PengirimanController;
use App\Http\Controllers\ItemPesananController;
use App\Http\Controllers\SubKategoriController;

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
Route::get('/forget', [AuthController::class, 'forget']);
Route::post('/send-email', [AuthController::class, 'authenticateForget']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard']);
    Route::post('/user/logout', [AuthController::class, 'logout']);
    //Edit All User
    Route::get('/akun/edit-user', [UserController::class, 'displayEditSelfUser']);
    Route::post('/akun/edit-user', [UserController::class, 'updateSelfUser']);

    Route::group(['middleware' => ['CekRole:1,5']], function () {
        //Belanja
        Route::get('/belanja', [PesananController::class, 'getListBelanja']);
        Route::post('/keterangan/update/{order_id}/{product_id}', [ItemPesananController::class, 'updateKeteranganItemBelanja']);
        Route::get('/keterangan/hapus/{order_id}/{product_id}', [ItemPesananController::class, 'deleteKeteranganItemBelanja']);
    });

    Route::group(['middleware' => ['CekRole:1,3,4']], function () {
        // Penjualan
        Route::get('/penjualan', [PenjualanController::class, 'displayPenjualan']);
        Route::get('/penjualan/grafik', [PenjualanController::class, 'getGrafikPenjualan']);
        Route::get('/penjualan/harian/{tanggal}', [PenjualanController::class, 'getDataPenjualanHarian']);
        Route::get('/penjualan/bulanan/{tanggal}', [PenjualanController::class, 'getDataPenjualanBulanan']);
        Route::get('/penjualan/periode/{tanggal_awal}/{tanggal_akhir}', [PenjualanController::class, 'getDataPenjualanPeriodeWaktu']);
        Route::get('/laporan/harian/rekap/{tanggal}', [PenjualanController::class, 'createLaporanPenjualanHarian']);
        Route::get('/laporan/bulanan/rekap/{tanggal}', [PenjualanController::class, 'createLaporanPenjualanBulanan']);
        Route::get('/laporan/periode/rekap/{tanggal_awal}/{tanggal_akhir}', [PenjualanController::class, 'createLaporanPenjualanPeriode']);
        Route::get('/penjualan/data', [PenjualanController::class, 'getDataPenjualan']);
    });

    Route::group(['middleware' => ['CekRole:1,2']], function () {
        //Produk
        Route::get('/produk', [ProdukController::class, 'index']);
        Route::get('/tambah-produk', [ProdukController::class, 'displayTambahProduk']);
        Route::post('produk/tambah', [ProdukController::class, 'createProduk']);
        Route::get('/produk/edit/{id}', [ProdukController::class, 'displayEditProduk']);
        Route::post('/produk/edit/{id}', [ProdukController::class, 'updateProduk']);
        Route::delete('/produk/hapus/{id}', [ProdukController::class, 'deleteProduk']);
        Route::get('/produk/get', [ProdukController::class, 'getProdukById']);
        Route::get('/viewPdf', [ProdukController::class, 'createKatalog']);

        //Kategori
        Route::get('/kategori', [KategoriController::class, 'index']);
        Route::post('/kategori/tambah', [KategoriController::class, 'createKategori']);
        Route::post('/kategori/edit/{id}', [KategoriController::class, 'updateKategori']);
        Route::delete('kategori/hapus/{id}', [KategoriController::class, 'deleteKategori']);

        //Sub Kategori
        Route::get('/subkategori/{id}', [SubKategoriController::class, 'index']);
        Route::get('/subkategori/get/{id}', [SubKategoriController::class, 'getSubKategori']);
        Route::post('/subkategori/tambah', [SubKategoriController::class, 'createSubKategori']);
        Route::post('/subkategori/edit/{id}', [SubKategoriController::class, 'updateSubKategori']);
        Route::delete('/subkategori/hapus/{id}', [SubKategoriController::class, 'deleteSubKategori']);

        //Pesanan
        Route::get('/pesanan', [PesananController::class, 'index']);
        Route::get('/pesanan/detail/{id}', [PesananController::class, 'getDetailPesanan']);
        Route::post('/cart/add', [ItemPesananController::class, 'addToCartItemPesanan'])->name('cart.add');
        Route::get('/cart/show', [ItemPesananController::class, 'showCart'])->name('cart.show');
        Route::get('/cart/delete/{id}', [ItemPesananController::class, 'deleteItemCart']);
        Route::get('/cart/delete', [ItemPesananController::class, 'deleteAllCart']);
        Route::get('/tambah-pesanan', [PesananController::class, 'displayTambahPesanan']);
        Route::get('/pesanan/status/{order_id}/{status_id}', [PesananController::class, 'updateStatusPesanan']);
        Route::post('/pesanan/tambah', [PesananController::class, 'createPesanan']);
        Route::get('/pesanan/edit/{id}', [PesananController::class, 'displayEditPesanan']);
        Route::post('/pesanan/edit/{id}', [PesananController::class, 'updatePesanan']);
        Route::delete('/pesanan/hapus/{id}', [PesananController::class, 'deletePesanan']);
        Route::get('/invoice/{id}', [PesananController::class, 'createInvoice']);

        //Pengiriman
        Route::get('/pengiriman', [PengirimanController::class, 'index']);
        Route::get('/pengiriman/detail/{id}', [PengirimanController::class, 'getDetailPengiriman']);
        Route::get('/tambah-pengiriman', [PengirimanController::class, 'displayTambahPengiriman']);
        Route::get('/tambah-detail-pengiriman', [PengirimanController::class, 'displayTambahDetailPengiriman']);
        Route::get('/pengiriman/edit/{id}', [PengirimanController::class, 'displayEditPengiriman']);
        Route::get('/pengiriman-detail/edit/{id}', [PengirimanController::class, 'displayEditDetailPengiriman']);
        Route::post('/pengiriman/tambah', [PengirimanController::class, 'createPengiriman']);
        Route::post('/pengiriman/edit/{id}', [PengirimanController::class, 'updatePengiriman']);
        Route::get('/pengiriman/status/{delivery_id}/{status_id}', [PengirimanController::class, 'updateStatusPengiriman']);
        Route::get('/pengiriman/list', [PengirimanController::class, 'showListPesanan']);
        Route::get('/pengiriman/data', [PengirimanController::class, 'showDataPesanan']);
        Route::post('/pengiriman/list/add_pesanan', [PengirimanController::class, 'createListPesanan']);
        Route::get('/pengiriman/list/list_delete', [PengirimanController::class, 'deleteAllList']);
        Route::get('/pengiriman/list/delete/{id}', [PengirimanController::class, 'deleteListCart']);
        Route::delete('/pengiriman/hapus/{id}', [PengirimanController::class, 'deleteDataPengiriman']);
        Route::get('/viewDeliveryPDF', [PengirimanController::class, 'createPengirimanPDF']);


        // Pelanggan
        Route::get('/pelanggan', [PelangganController::class, 'index']);
        Route::get('/tambah-pelanggan', [PelangganController::class, 'displayTambahPelanggan']);
        Route::post('/pelanggan/tambah', [PelangganController::class, 'createPelanggan']);
        Route::get('/pelanggan/hapus/{id}', [PelangganController::class, 'deletePelanggan']);
        Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'displayEditPelanggan']);
        Route::delete('/pelanggan/hapus/{id}', [PelangganController::class, 'deletePelanggan']);
        Route::get('/pelanggan/get', [PelangganController::class, 'getPelangganById']);
        Route::post('/pelanggan/edit/{id}', [PelangganController::class, 'updatePelanggan']);

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
});
