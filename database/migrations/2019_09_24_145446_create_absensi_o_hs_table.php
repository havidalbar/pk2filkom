<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsensiOHsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_oh', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->unsignedBigInteger('nim')->nullable();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->unsignedSmallInteger('absensi')->default(0);
            $table->string('booth')->nullable();
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
        Schema::dropIfExists('absensi_oh');
    }
}
