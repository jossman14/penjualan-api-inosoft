<?php
declare(strict_types = 1);

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
    public function get_all_kendaraan(){


        $data = $this->kendaraanService->get_all_kendaraan();
        return response()->json([
            'success' => true,
            'message' => 'Data seluruh kendaraan',
            'data' => $data,
        ], Response::HTTP_OK);
    }
    public function get_all_mobil(){
        


        $data = $this->kendaraanService->get_all_mobil();
        return response()->json([
            'success' => true,
            'message' => 'Data seluruh mobil',
            'data' => $data,
        ], Response::HTTP_OK);
    }
    public function get_all_motor(){
        $data = Kendaraan::where("type","=","motor")->get();


        $data = $this->kendaraanService->get_all_motor();
        return response()->json([
            'success' => true,
            'message' => 'Data seluruh motor',
            'data' => $data,
        ], Response::HTTP_OK);
    }
    public function stok_kendaraan(){

        $data = $this->kendaraanService->stok_kendaraan();
        return response()->json([
            'success' => true,
            'message' => 'Data jumlah data dan stok kendaraan',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function stok_mobil(){

        $data = $this->kendaraanService->stok_mobil();
        ;

        return response()->json([
            'success' => true,
            'message' => 'Data stok maksimum dan minimum mobil',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function stok_motor(){

        $data = $this->kendaraanService->stok_motor();
        ;

        return response()->json([
            'success' => true,
            'message' => 'Data stok maksimum dan minimum motor',
            'data' => $data,
        ], Response::HTTP_OK);
    }
    public function penjualan_mobil($id){

        $data = $this->kendaraanService->penjualan_mobil($id);

        if($data == null){
            return response()->json([
                'success' => false,
                'message' => "data tidak ditemukan, mohon cek kembali id mobil anda",

            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'success' => true,
            'message' => 'penjualan berhasil',
            'data' => $data,
        ], Response::HTTP_CREATED);
    }
    public function penjualan_motor($id){
        $data = $this->kendaraanService->penjualan_motor($id);

        if($data == null){
            return response()->json([
                'success' => false,
                'message' => "data tidak ditemukan, mohon cek kembali id motor anda",

            ], Response::HTTP_BAD_REQUEST);
        }

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
        ], Response::HTTP_OK);
    }

    public function rekap_penjualan_mobil(){

        $data = $this->kendaraanService->rekap_penjualan_mobil();


        return response()->json([
            'success' => true,
            'message' => 'Data jumlah maksimum dan minimum penjualan mobil',
            'data' => $data,
        ], Response::HTTP_OK);
    }

    public function rekap_penjualan_motor(){
        $data = $this->kendaraanService->rekap_penjualan_motor();


        return response()->json([
            'success' => true,
            'message' => 'Data jumlah maksimum dan minimum penjualan motor',
            'data' => $data,
        ], Response::HTTP_OK);
    }
}
