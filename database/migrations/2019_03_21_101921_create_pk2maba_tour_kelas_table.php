<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePk2mabaTourKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2maba_tour_kelas', function (Blueprint $table) {
            $table->string('ruang', 191)->primary();
            $table->string('bidang', 191);
            $table->foreign('bidang')->references('bidang')->on('bidang');
            $table->unsignedSmallInteger('kuota');
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
        Schema::dropIfExists('pk2maba_tour_kelas');
    }
}
