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
        Schema::create('pesan_tikets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qty_tiket');
            $table->date('tgl_pesan');
            $table->integer('total_harga');
            $table->integer('id_jadwal')->unsigned();
            $table->integer('id_wisata')->unsigned();
            $table->integer('id_member')->unsigned();

            $table->foreign('id_wisata')->references('id')->on('wisatas');
            $table->foreign('id_jadwal')->references('id')->on('jadwals');
            $table->foreign('id_member')->references('id')->on('members');
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
        Schema::dropIfExists('pesan_tikets');
    }
};
