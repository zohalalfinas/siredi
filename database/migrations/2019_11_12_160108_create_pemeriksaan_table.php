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
            $table->text('keterangan');
            $table->text('diagnosa');
            $table->unsignedBigInteger('resep_id')->nullable();
            $table->unsignedBigInteger('pasien_id')->nullable();
            $table->timestamps();

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
