<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_artikel', function (Blueprint $table) {
			$table->bigIncrements('id');
            $table->unsignedInteger('id_artikel');
            $table->foreign('id_artikel')->references('id')->on('artikel');			
			$table->string('thumbnail', 191);
			$table->mediumText('deskripsi');
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
        Schema::dropIfExists('sub_artikel');
    }
}
