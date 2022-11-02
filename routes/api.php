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
    Route::get('user-profile', [ApiController::class, 'userProfile']);
    Route::post('refresh', [ApiController::class, 'refresh']);
});
Route::get('stok-kendaraan', [KendaraanController::class, 'stok_kendaraan']);
Route::get('stok-mobil', [KendaraanController::class, 'stok_mobil']);
Route::get('stok-motor', [KendaraanController::class, 'stok_motor']);
Route::get('penjualan-mobil/{id}', [KendaraanController::class, 'penjualan_mobil']);
Route::get('penjualan-motor/{id}', [KendaraanController::class, 'penjualan_motor']);
Route::get('rekap-penjualan-kendaraan', [KendaraanController::class, 'rekap_penjualan_kendaraan']);
Route::get('rekap-penjualan-mobil', [KendaraanController::class, 'rekap_penjualan_mobil']);
Route::get('rekap-penjualan-motor', [KendaraanController::class, 'rekap_penjualan_motor']);


