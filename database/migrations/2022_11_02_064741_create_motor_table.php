<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motor', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_suspensi');
            $table->string('tipe_transmisi');
            // $table->integer('kendaraan_id')->unsigned();
            // $table->foreign('kendaraan_id')->references('id')->on('kendaraan');
            $table->foreignId('kendaraan_id');

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
        Schema::dropIfExists('motor');
    }
}
