<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenilaianBetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_beta', function (Blueprint $table) {
            $table->string('id', 36)->primary();
            $table->unsignedBigInteger('nim');
            $table->unsignedBigInteger('id_penugasan');
            $table->foreign('id_penugasan')->references('id')->on('penugasan_beta')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedTinyInteger('nilai')->default(0);
            $table->string('editor', 30)->nullable();
            $table->foreign('editor')->references('username')->on('pengguna')
                ->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('penilaian_beta');
    }
}
