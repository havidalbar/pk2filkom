<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ForeignKeyPenugasanSoalBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('penugasan_soal_beta', function (Blueprint $table) {
            $table->foreign('id_jawaban_benar')->references('id')->on('penugasan_jawaban_beta')->onDelete('cascade')->onUpdate('cascade');			
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
