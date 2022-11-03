<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KendaraanController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', [ApiController::class, 'authenticate'])->name('login');
Route::post('register', [ApiController::class, 'register'])->name('register');
Route::post('logout', [ApiController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['jwt.verify']], function() {
    //user
    Route::get('user-profile', [ApiController::class, 'userProfile'])->name('user-profile');
    Route::get('refresh', [ApiController::class, 'refresh'])->name('refresh');
    Route::get('get-all-user', [ApiController::class, 'get_all_user'])->name('get-all-user');
    //additional
    Route::get('get-all-kendaraan', [KendaraanController::class, 'get_all_kendaraan'])->name('get-all-kendaraan');
    Route::get('get-all-mobil', [KendaraanController::class, 'get_all_mobil'])->name('get-all-mobil');
    Route::get('get-all-motor', [KendaraanController::class, 'get_all_motor'])->name('get-all-motor');
    // stok
    Route::get('stok-kendaraan', [KendaraanController::class, 'stok_kendaraan'])->name('stok-kendaraan');
    Route::get('stok-mobil', [KendaraanController::class, 'stok_mobil'])->name('stok-mobil');
    Route::get('stok-motor', [KendaraanController::class, 'stok_motor'])->name('stok-motor');
    // penjualan
    Route::get('penjualan-mobil/{id}', [KendaraanController::class, 'penjualan_mobil'])->name('penjualan-mobil');
    Route::get('penjualan-motor/{id}', [KendaraanController::class, 'penjualan_motor'])->name('penjualan-motor');
    // laporan penjualan
    Route::get('rekap-penjualan-kendaraan', [KendaraanController::class, 'rekap_penjualan_kendaraan'])->name('rekap-penjualan-kendaraan');
    Route::get('rekap-penjualan-mobil', [KendaraanController::class, 'rekap_penjualan_mobil'])->name('rekap-penjualan-mobil');
    Route::get('rekap-penjualan-motor', [KendaraanController::class, 'rekap_penjualan_motor'])->name('rekap-penjualan-motor');

});
