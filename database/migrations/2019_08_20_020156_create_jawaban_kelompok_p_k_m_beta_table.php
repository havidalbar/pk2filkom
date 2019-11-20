<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJawabanKelompokPKMBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_kelompok_pkm_beta', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('id_kelompok', 36);
            $table->foreign('id_kelompok')->references('id')->on('kelompok_pkm')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('id_soal', 36);
            $table->foreign('id_soal')->references('id')->on('penugasan_soal_beta')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->text('jawaban')->nullable();
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
        Schema::dropIfExists('jawaban_kelompok_pkm_beta');
    }
}
