<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKelompokPKMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok_pkm', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->string('bidang')->nullable();
            $table->foreign('bidang')->references('bidang')->on('bidang')
                ->onUpdate('cascade')->onDelete('set null');
            $table->unsignedSmallInteger('nomor');
            $table->unsignedBigInteger('nim_ketua')->nullable();
            $table->foreign('nim_ketua')->references('nim')->on('mahasiswa');
            $table->unsignedBigInteger('nim_anggota1')->nullable();
            $table->foreign('nim_anggota1')->references('nim')->on('mahasiswa');
            $table->unsignedBigInteger('nim_anggota2')->nullable();
            $table->foreign('nim_anggota2')->references('nim')->on('mahasiswa');
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
        Schema::dropIfExists('kelompok_pkm');
    }
}
