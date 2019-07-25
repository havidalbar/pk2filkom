<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bios', function (Blueprint $table) {
            $table->unsignedBigInteger('nim')->primary();
            $table->foreign('nim')->references('nim')->on('mahasiswa');
            $table->integer('absensi')->default(0);
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
        Schema::dropIfExists('bios');
    }
}
