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
        Schema::create('diskon_wisatas', function (Blueprint $table) {
            $table->integer('id_wisata')->unsigned();
            $table->integer('id_diskon')->unsigned();

            $table->foreign('id_wisata')->references('id')->on('wisatas');
            $table->foreign('id_diskon')->references('id')->on('diskons');
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
        Schema::dropIfExists('diskon_wisatas');
    }
};