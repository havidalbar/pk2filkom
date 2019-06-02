<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartupAcademyKeaktifanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('startup_academy_keaktifan', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->smallInteger('aktif_rangkaian3')->default(0);
            $table->smallInteger('penerapan_nilai_rangkaian3')->default(0);
            $table->smallInteger('aktif_rangkaian4')->default(0);
            $table->smallInteger('penerapan_nilai_rangkaian4')->default(0);
            $table->smallInteger('aktif_rangkaian5')->default(0);
			$table->smallInteger('penerapan_nilai_rangkaian5')->default(0);
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
        Schema::dropIfExists('startup_academy_keaktifan');
    }
}
