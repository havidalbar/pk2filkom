<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePk2mabaPelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2maba_pelanggaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim');
            $table->integer('ringan')->default('0');
            $table->integer('sedang')->default('0');
            $table->integer('berat')->default('0');
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
        Schema::dropIfExists('pk2maba_pelanggaran');
    }
}
