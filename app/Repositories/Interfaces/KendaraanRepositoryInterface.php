<?php

namespace App\Repositories\Interfaces;

use LaravelEasyRepository\Repository;

interface KendaraanRepositoryInterface extends Repository{

    public function stok_kendaraan();
    public function stok_mobil();
    public function stok_motor();
    public function penjualan_mobil($id);
    public function penjualan_motor($id);
    public function rekap_penjualan_kendaraan();
    public function rekap_penjualan_mobil();
    public function rekap_penjualan_motor();
}
