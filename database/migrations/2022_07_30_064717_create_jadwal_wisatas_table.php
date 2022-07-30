<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_wisatas', function (Blueprint $table) {
            $table->integer('id_jadwal')->unsigned();
            $table->integer('id_wisata')->unsigned();
            $table->integer('kuota');
            $table->integer('tarif');

            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->foreign('id_wisata')->references('id')->on('wisatas');

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
        Schema::dropIfExists('jadwal_wisatas');
    }
};
