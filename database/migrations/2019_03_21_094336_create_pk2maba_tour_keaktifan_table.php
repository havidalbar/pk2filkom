<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePk2mabaTourKeaktifanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2maba_tour_keaktifan', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->smallInteger('aktif_rangkaian6')->default(0);
            $table->smallInteger('penerapan_nilai_rangkaian6')->default(0);
            $table->smallInteger('aktif_rangkaian7')->default(0);
            $table->smallInteger('penerapan_nilai_rangkaian7')->default(0);
            $table->smallInteger('aktif_rangkaian8')->default(0);
			$table->smallInteger('penerapan_nilai_rangkaian8')->default(0);
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
        Schema::dropIfExists('pk2maba_tour_keaktifan');
    }
}
