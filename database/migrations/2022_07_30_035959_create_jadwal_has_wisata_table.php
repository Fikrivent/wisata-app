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
        Schema::create('jadwal_has_wisata', function (Blueprint $table) {
            $table->unsignedInteger('id_jadwal');
            $table->unsignedInteger('id_wisata');
            $table->integer('kuota');
            $table->integer('tarif');

            $table->foreign('id_jadwal')->references('id')->on('jadwal');
            $table->foreign('id_wisata')->references('id')->on('wisata');
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
        Schema::dropIfExists('jadwal_has_wisata');
    }
};
