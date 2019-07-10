<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEditorColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artikel', function (Blueprint $table) {
            $table->string('editor', 30)->nullable()->after('thumbnail');
            $table->foreign('editor')->references('username')->on('pengguna')->onDelete('set null')->onUpdate('cascade');
        });

        Schema::table('faq', function (Blueprint $table) {
            $table->string('editor', 30)->nullable()->after('jawab');
            $table->foreign('editor')->references('username')->on('pengguna')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
