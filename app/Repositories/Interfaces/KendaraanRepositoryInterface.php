<?php
declare(strict_types = 1);

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
    public function get_all_kendaraan();
    public function get_all_mobil();
    public function get_all_motor();
}
