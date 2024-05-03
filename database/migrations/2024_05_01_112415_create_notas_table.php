<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('2122091_nota', function (Blueprint $table) {
            $table->char('2122091_NoNota', 6)->primary();
            $table->char('2122091_NoSP', 6);
            $table->date('2122091_TglNota');
            $table->double('2122091_JmlHarga');

            $table->foreign('2122091_noSP')->on('2122091_sp')->references('2122091_NoSP');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
