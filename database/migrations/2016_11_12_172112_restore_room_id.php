<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestoreRoomId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colloquia', function(Blueprint $table) {
            $table->integer('room_id')->unsigned()->foreign('room_id')->references('id')->on('room')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('colloquia', function(Blueprint $table) {
            $table->dropColumn('room_id');
        });
    }
}
