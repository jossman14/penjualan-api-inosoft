<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Mobil;
use App\Models\User;
use App\Services\KendaraanService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class KendaraanController extends Controller
{
    private KendaraanService $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
  {
      $this->kendaraanService = $kendaraanService;
  }
    public function stok_kendaraan(){

        $data = $this->kendaraanService->stok_kendaraan();
        return response()->json([
            'success' => true,
            'message' => 'Data jumlah data dan stok kendaraan',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    public function stok_mobil(){

        $data = $this->kendaraanService->stok_mobil();
        ;

        return response()->json([
            'success' => true,
            'message' => 'Data stok maksimum dan minimum mobil',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    public function stok_motor(){

        $data = $this->kendaraanService->stok_motor();
        ;

        return response()->json([
            'success' => true,
            'message' => 'Data stok maksimum dan minimum motor',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }
    public function penjualan_mobil($id){

        $data = $this->kendaraanService->penjualan_mobil($id);

        return response()->json([
            'success' => true,
            'message' => 'penjualan berhasil',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }
    public function penjualan_motor($id){
        $data = $this->kendaraanService->penjualan_motor($id);

        return response()->json([
            'success' => true,
            'message' => 'penjualan berhasil',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }
    public function rekap_penjualan_kendaraan(){


      $data = $this->kendaraanService->rekap_penjualan_kendaraan();

        return response()->json([
            'success' => true,
            'message' => 'Data jumlah penjualan kendaraan',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }

    public function rekap_penjualan_mobil(){
    
        // $data = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Data jumlah maksimum dan minimum penjualan mobil',
            'data' => [
                "penjualan_mobil_maksimum" => $penjualan_mobil_maksimum,
                "penjualan_mobil_minimum" => $penjualan_mobil_minimum,

            ],
        ], Response::HTTP_CREATED);
    }

    public function rekap_penjualan_motor(){
        $penjualan_motor_maksimum = Kendaraan::where("type","=","motor")->max('penjualan');
        $penjualan_motor_minimum = Kendaraan::where("type","=","motor")->min('penjualan');
        // $data = User::all();

        return response()->json([
            'success' => true,
            'message' => 'Data jumlah maksimum dan minimum penjualan motor',
            'data' => [
                "penjualan_motor_maksimum" => $penjualan_motor_maksimum,
                "penjualan_motor_minimum" => $penjualan_motor_minimum,

            ],
        ], Response::HTTP_CREATED);
    }
}
