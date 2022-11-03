<?php
declare(strict_types = 1);

namespace Tests\Feature;

use App\Models\Kendaraan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PenjualanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_penjualan_mobil()
    {
        $token = $this->authenticate();
        $data = Kendaraan::where("type",'=',"mobil")->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route("penjualan-mobil", $data));


        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(201);
    }
    public function test_penjualan_motor()
    {
        $token = $this->authenticate();
        $data = Kendaraan::where("type",'=',"motor")->first();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token,
        ])->json('GET',route("penjualan-motor", $data));


        //Write the response in laravel.log
        \Log::info(1, [$response->getContent()]);

        $response->assertStatus(201);
    }
}
