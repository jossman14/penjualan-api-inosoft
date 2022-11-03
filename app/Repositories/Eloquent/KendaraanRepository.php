<?php
declare(strict_types = 1);

namespace App\Repositories\Eloquent;

use Illuminate\Http\Response;
use LaravelEasyRepository\Implementations\Eloquent;
use App\Repositories\Interfaces\KendaraanRepositoryInterface;
use App\Models\Kendaraan;
use MongoDB\Exception\Exception;

class KendaraanRepository extends Eloquent implements KendaraanRepositoryInterface{

    /**
    * Model class to be used in this repository for the common methods inside Eloquent
    * Don't remove or change $this->model variable name
    * @property Model|mixed $model;
    */
    protected $model;

    public function __construct(Kendaraan $model)
    {
        $this->model = $model;
    }

    public function stok_kendaraan(){
        $jumlah_kendaraan = Kendaraan::count();
        $jumlah_mobil = Kendaraan::where("type","=","mobil")->count();
        $jumlah_motor = Kendaraan::where("type","=","motor")->count();
        $jumlah_stok_kendaraan = Kendaraan::sum('stok');
        $jumlah_stok_mobil = Kendaraan::where("type","=","mobil")->sum('stok');
        $jumlah_stok_motor = Kendaraan::where("type","=","motor")->sum('stok');
        $data = [
            "jumlah_kendaraan" => $jumlah_kendaraan,
            "jumlah_mobil" => $jumlah_mobil,
            "jumlah_motor" => $jumlah_motor,
            "jumlah_stok_kendaraan" => $jumlah_stok_kendaraan,
            "jumlah_stok_mobil" => $jumlah_stok_mobil,
            "jumlah_stok_motor" => $jumlah_stok_motor,
        ];
        return $data;
    }
    public function stok_mobil(){
        $jumlah_mobil_maksimum = Kendaraan::where("type","=","mobil")->max('stok');
        $jumlah_mobil_minimum = Kendaraan::where("type","=","mobil")->min('stok');

        $data = [
            "jumlah_mobil_maksimum" => $jumlah_mobil_maksimum,
            "jumlah_mobil_minimum" => $jumlah_mobil_minimum,

        ];

        return $data;
    }
    public function stok_motor(){
        $jumlah_motor_maksimum = Kendaraan::where("type","=","motor")->max('stok');
        $jumlah_motor_minimum = Kendaraan::where("type","=","motor")->min('stok');

        $data = [
            "jumlah_motor_maksimum" => $jumlah_motor_maksimum,
            "jumlah_motor_minimum" => $jumlah_motor_minimum,

        ];
        return $data;
    }
    public function penjualan_mobil($id){

        $data = Kendaraan::where("type","=","mobil")->find($id);

        return $data;

    }
    public function penjualan_motor($id){
        $data = Kendaraan::where("type","=","motor")->find($id);

        return $data;
    }
    public function rekap_penjualan_kendaraan(){
        $jumlah_penjualan_kendaraan = Kendaraan::sum('penjualan');
        $jumlah_penjualan_mobil = Kendaraan::where("type","=","mobil")->sum('penjualan');
        $jumlah_penjualan_motor = Kendaraan::where("type","=","motor")->sum('penjualan');

        $data = [
            "jumlah_penjualan_kendaraan" => $jumlah_penjualan_kendaraan,
            "jumlah_penjualan_mobil" => $jumlah_penjualan_mobil,
            "jumlah_penjualan_motor" => $jumlah_penjualan_motor,
        ];

        return $data;
    }
    public function rekap_penjualan_mobil(){
        $penjualan_mobil_maksimum = Kendaraan::where("type","=","mobil")->max('penjualan');
        $penjualan_mobil_minimum = Kendaraan::where("type","=","mobil")->min('penjualan');
        $data = [
            "penjualan_mobil_maksimum" => $penjualan_mobil_maksimum,
            "penjualan_mobil_minimum" => $penjualan_mobil_minimum,

        ];

        return $data;
    }
    public function rekap_penjualan_motor(){
         $penjualan_motor_maksimum = Kendaraan::where("type","=","motor")->max('penjualan');
        $penjualan_motor_minimum = Kendaraan::where("type","=","motor")->min('penjualan');
        $data = [
            "penjualan_motor_maksimum" => $penjualan_motor_maksimum,
            "penjualan_motor_minimum" => $penjualan_motor_minimum,

        ];

        return $data;
    }

    public function get_all_kendaraan(){
        $data = Kendaraan::all();
        return $data;
    }
    public function get_all_mobil(){
        $data = Kendaraan::where("type","=","mobil")->get();
        return $data;

    }
    public function get_all_motor(){
        $data = Kendaraan::where("type","=","motor")->get();
        return $data;

    }
}
