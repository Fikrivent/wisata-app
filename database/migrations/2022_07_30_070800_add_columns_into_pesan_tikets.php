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
        Schema::table('pesan_tikets', function (Blueprint $table) {
            //
            $table->string('nomor_tiket',32);
            $table->integer('id_diskon')->nullable()->unsigned();

            $table->foreign('id_diskon')->references('id')->on('diskons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesan_tikets', function (Blueprint $table) {
            //
        });
    }
};
