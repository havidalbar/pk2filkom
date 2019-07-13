<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupAcademyAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_academy_absensi', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->smallInteger('nilai_rangkaian3')->default(0);
            $table->smallInteger('nilai_rangkaian4')->default(0);
            $table->smallInteger('nilai_rangkaian5')->default(0);
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
        Schema::dropIfExists('startup_academy_absensi');
    }
}
