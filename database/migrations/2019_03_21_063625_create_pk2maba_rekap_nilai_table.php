<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePk2mabaRekapNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2maba_rekap_nilai', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->smallInteger('nilai_rangkaian1')->default(0);
			$table->smallInteger('nilai_rangkaian2')->default(0);
			$table->smallInteger('aktif_rangkaian1')->default(0);
            $table->smallInteger('penerapan_nilai_rangkaian1')->default(0);
            $table->smallInteger('aktif_rangkaian2')->default(0);
			$table->smallInteger('penerapan_nilai_rangkaian2')->default(0);
			$table->smallInteger('ringan')->default(0);
            $table->smallInteger('sedang')->default(0);
			$table->smallInteger('berat')->default(0);
			$table->string('editor', 30)->nullable();
            $table->foreign('editor')->references('username')->on('pengguna')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('pk2maba_rekap_nilai');
    }
}
