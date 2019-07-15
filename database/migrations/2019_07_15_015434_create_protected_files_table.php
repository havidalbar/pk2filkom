<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectedFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protected_files', function (Blueprint $table) {
            $table->string('path', 191);
            $table->primary('path');
            $table->bigInteger('nim');
            $table->string('id_soal', 32)->nullable();
            $table->foreign('id_soal')->references('id_soal')->on('jawaban_beta')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('mahasiswa')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('protected_files');
    }
}
