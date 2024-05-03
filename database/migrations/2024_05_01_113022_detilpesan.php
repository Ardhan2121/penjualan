<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detilpesan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2122091_detil_pesan', function (Blueprint $table) {
            $table->char('2122091_NoSP', 6);
            $table->char('2122091_KdBarang', 6);
            $table->integer('2122091_JmlJual');
            $table->double('2122091_HrgJual');

            $table->foreign('2122091_NoSP')->on('2122091_sp')->references('2122091_NoSP');
            $table->foreign('2122091_KdBarang')->on('2122091_barang')->references('2122091_KdBarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
