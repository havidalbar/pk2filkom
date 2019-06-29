<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanJawabanBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan_jawaban_beta', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('id_soal', 36);
            $table->foreign('id_soal')->references('id')->on('penugasan_soal_beta')->onDelete('cascade')->onUpdate('cascade');
            $table->text('pilihan_jawaban');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penugasan_jawaban_beta');
    }
}
