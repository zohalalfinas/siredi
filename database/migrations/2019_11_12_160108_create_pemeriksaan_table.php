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
            $table->unsignedBigInteger('dokter_id')->nullable();
            $table->unsignedBigInteger('resep_id')->nullable();
            $table->unsignedBigInteger('pasien_id')->nullable();
            $table->timestamps();

            $table->foreign('dokter_id')->references('id')->on('dokter')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('resep_id')->references('id')->on('resep')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
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
