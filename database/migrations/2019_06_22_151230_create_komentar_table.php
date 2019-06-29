<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomentarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('id_artikel');
            $table->foreign('id_artikel')->references('id')->on('artikel');
            $table->text('isi');
            $table->unsignedBigInteger('komentar_ke')->nullable();
            $table->foreign('komentar_ke')->references('id')->on('komentar')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('nim_mahasiswa')->nullable();
            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswa');
            $table->string('username_admin', 30)->nullable();
            $table->foreign('username_admin')->references('username')->on('pengguna')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('komentar');
    }
}
