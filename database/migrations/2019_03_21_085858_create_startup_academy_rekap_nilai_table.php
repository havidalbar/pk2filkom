<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartupAcademyRekapNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_academy_rekap_nilai', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim');
            $table->integer('aktif_rangkaian3')->default('0');
            $table->integer('penerapan_nilai_rangkaian3')->default('0');
            $table->integer('aktif_rangkaian4')->default('0');
            $table->integer('penerapan_nilai_rangkaian4')->default('0');
            $table->integer('aktif_rangkaian5')->default('0');
            $table->integer('penerapan_nilai_rangkaian5')->default('0');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->unsigned()->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('startup_academy_rekap_nilai');
    }
}
