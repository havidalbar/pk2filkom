<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPenugasanToJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jawaban_beta', function (Blueprint $table) {
            $table->unsignedBigInteger('id_penugasan')->after('nim');
            $table->foreign('id_penugasan')->references('id')->on('penugasan_beta')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jawaban_beta', function (Blueprint $table) {
            $table->dropForeign(['id_penugasan']);
            $table->dropColumn('id_penugasan');
        });
    }
}
