<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('obat_id');
            $table->string('dosis');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('obat_id')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resep');
    }
}
