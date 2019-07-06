<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClusterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cluster', function (Blueprint $table) {
            $table->string('nama', 20)->primary();
            $table->unsignedSmallInteger('nilai_kebersamaan')->default(300);
            $table->string('editor', 30)->nullable();
            $table->foreign('editor')->references('username')->on('pengguna')->onDelete('set null')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('cluster', 20)->nullable()->change();
            $table->foreign('cluster')->references('nama')->on('cluster')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->dropForeign('mahasiswa_cluster_foreign');
        });

        Schema::dropIfExists('cluster');
    }
}
