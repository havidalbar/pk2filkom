<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePk2mabaTourAbsensiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pk2maba_tour_absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nim');
            $table->integer('nilai_rangkaian6')->default('0');
            $table->integer('nilai_rangkaian7')->default('0');
            $table->integer('nilai_rangkaian8')->default('0');
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
        Schema::dropIfExists('pk2maba_tour_absensi');
    }
}
