<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAlergiColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
            $table->string('no_telepon', 20)->nullable()->after('cluster');
            $table->text('alergi_makanan')->nullable()->after('no_telepon');
            $table->text('alergi_obat')->nullable()->after('alergi_makanan');
            $table->text('riwayat_penyakit')->nullable()->after('alergi_obat');
            $table->string('tempat_lahir', 191)->nullable()->after('riwayat_penyakit');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');
            $table->string('gol_darah', 2)->nullable()->after('tanggal_lahir');
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
            $table->dropColumn('no_telepon');
            $table->dropColumn('alergi_makanan');
            $table->dropColumn('alergi_obat');
            $table->dropColumn('riwayat_penyakit');
            $table->dropColumn('tempat_lahir');
            $table->dropColumn('tanggal_lahir');
            $table->dropColumn('gol_darah');
        });
    }
}
