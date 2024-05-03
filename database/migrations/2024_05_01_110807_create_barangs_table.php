<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2122091_barang', function (Blueprint $table) {
            $table->char('2122091_KdBarang', 6)->primary();
            $table->string('2122091_NmBarang', 35);
            $table->string('2122091_Satuan', 10);
            $table->integer('2122091_Stok');
            $table->double('2122091_HrgBarang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('2122091_barang');
    }
}
