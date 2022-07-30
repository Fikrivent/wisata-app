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
        Schema::table('pesan_tiket', function (Blueprint $table) {
            //
            $table->unsignedInteger('id_member');

            $table->foreign('id_member')->references('id')->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pesan_tiket', function (Blueprint $table) {
            //
            $table->dropForeign('id_member');
            $table->dropColumn('id_member');
        });
    }
};
