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
        Schema::create('wisata_has_diskon', function (Blueprint $table) {
            $table->unsignedInteger('id_wisata');
            $table->unsignedInteger('id_diskon');

            $table->foreign('id_diskon')->references('id')->on('diskon');
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
        Schema::dropIfExists('wisata_has_diskon');
    }
};
