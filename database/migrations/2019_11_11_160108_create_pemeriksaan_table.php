<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tgl_pemeriksaan');
            $table->string('jam_pemeriksaan');
            $table->string('keterangan');
            $table->string('diagnosa');
            $table->unsignedBigInteger('id_dokter')->nullable();
            $table->unsignedBigInteger('id_resep')->nullable();
            $table->unsignedBigInteger('id_pasien')->nullable();
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
        Schema::dropIfExists('pemeriksaan');
    }
}
