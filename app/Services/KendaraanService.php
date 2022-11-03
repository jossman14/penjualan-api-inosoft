<?php
declare(strict_types = 1);

namespace App\Services;

use LaravelEasyRepository\Service;
use App\Repositories\Interfaces\KendaraanRepositoryInterface;

class KendaraanService extends Service {

     /**
     * don't change $this->mainInterface variable name
     * because used in extends service class
     */
     protected $mainInterface;

    public function __construct(KendaraanRepositoryInterface $mainInterface)
    {
      $this->mainInterface = $mainInterface;
    }

    public function stok_kendaraan(){
        return $this->mainInterface->stok_kendaraan();

    }
    public function stok_mobil(){
        return $this->mainInterface->stok_mobil();

    }
    public function stok_motor(){
        return $this->mainInterface->stok_motor();

    }
    public function penjualan_mobil($id){
        $data = $this->mainInterface->penjualan_mobil($id);

        if($data == null){
            return $data;
        }

        $data->stok = $data->stok - 1;
        $data->penjualan = $data->penjualan + 1;
        $data->update($data->toArray());

        return $data;
    }
    public function penjualan_motor($id){
        $data = $this->mainInterface->penjualan_motor($id);
        if($data == null){
            return $data;
        }
        $data->stok = $data->stok - 1;
        $data->penjualan = $data->penjualan + 1;
        $data->update($data->toArray());

        return $data;
    }
    public function rekap_penjualan_kendaraan(){
        return $this->mainInterface->rekap_penjualan_kendaraan();

    }
    public function rekap_penjualan_mobil(){
        return $this->mainInterface->rekap_penjualan_mobil();

    }
    public function rekap_penjualan_motor(){
        return $this->mainInterface->rekap_penjualan_motor();

    }

    public function get_all_kendaraan(){
        return $this->mainInterface->get_all_kendaraan();

    }
    public function get_all_mobil(){
        return $this->mainInterface->get_all_mobil();

    }
    public function get_all_motor(){
        return $this->mainInterface->get_all_motor();

    }
}
