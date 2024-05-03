<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2122091_sp', function (Blueprint $table) {
            $table->char('2122091_NoSP', 6)->primary();
            $table->char('2122091_IdPelanggan', 4);
            $table->date('2122091_TglSP');

            $table->foreign('2122091_IdPelanggan')->on('2122091_pelanggan')->references('2122091_IdPelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sps');
    }
}
