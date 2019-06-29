<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanSoalBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan_soal_beta', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->unsignedBigInteger('id_penugasan');
            $table->foreign('id_penugasan')->references('id')->on('penugasan_beta')->onDelete('cascade')->onUpdate('cascade');
            $table->text('soal');
            $table->string('id_jawaban_benar', 36)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penugasan_soal_beta');
    }
}
