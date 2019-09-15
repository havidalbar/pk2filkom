<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->string('nama', 191);
            $table->unsignedTinyInteger('jenis_kelamin')->nullable();
            $table->unsignedTinyInteger('agama')->nullable();
            $table->unsignedTinyInteger('prodi')->nullable();
            $table->unsignedTinyInteger('kelompok')->nullable();
            $table->string('cluster', 20);
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
        Schema::dropIfExists('mahasiswa');
    }
}
