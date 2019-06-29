<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenugasanBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penugasan_beta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug', 191);
            $table->string('judul', 191);
            $table->unsignedTinyInteger('jenis');
            $table->boolean('random')->default(0);
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_akhir');
            $table->unsignedSmallInteger('batas_waktu')->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('editor', 30)->nullable();
            $table->foreign('editor')->references('username')->on('pengguna')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('penugasan_beta');
    }
}
