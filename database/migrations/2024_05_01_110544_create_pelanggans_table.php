<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2122091_Pelanggan', function (Blueprint $table) {
            $table->char('2122091_IdPelanggan', 4)->primary();
            $table->string('2122091_NmPelanggan', 35);
            $table->string('2122091_Alamat', 100);
            $table->string('2122091_NoTelp', 13);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('2122091_pelanggan');
    }
}
