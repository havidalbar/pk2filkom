<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePk2mabaAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2maba_absensi', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->smallInteger('nilai_rangkaian1')->default(0);
			$table->smallInteger('nilai_rangkaian2')->default(0);
			$table->string('editor', 30)->nullable();
            $table->foreign('editor')->references('username')->on('pengguna');
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
        Schema::dropIfExists('pk2maba_absensi');
    }
}
