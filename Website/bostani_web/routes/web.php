<?php

use App\Http\Controllers\PenjualanController;
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

Route::get('/penjualan', [PenjualanController::class, 'displayPenjualan']);