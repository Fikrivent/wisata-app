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
        Schema::create('pesan_tiket', function (Blueprint $table) {
            $table->id();
            $table->integer('qty_tiket');
            $table->date('tgl_pesan');
            $table->integer('total_harga');
            
            $table->unsignedInteger('id_jadwal');
            $table->unsignedInteger('id_wisata');
            
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
        Schema::dropIfExists('pesan_tiket');
    }
};
