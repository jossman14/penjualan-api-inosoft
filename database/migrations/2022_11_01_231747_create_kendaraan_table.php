<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun_keluaran');
            $table->string('warna');
            $table->integer('harga');
            $table->string('mesin')->nullable();
            $table->string('tipe_suspensi')->nullable();
            $table->string('tipe_transmisi')->nullable();
            $table->string('kapasitas_penumpang')->nullable();
            $table->string('tipe_mobil')->nullable();
            $table->string('stok');
            $table->string('penjualan');
            $table->string('type')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kendaraan');
    }
}
