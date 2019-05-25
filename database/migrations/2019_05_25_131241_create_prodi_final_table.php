<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdiFinalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi_final', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->unsigned()->nullable();
            $table->integer('nilaiFull')->default('0');
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
        Schema::dropIfExists('prodi_final');
    }
}
