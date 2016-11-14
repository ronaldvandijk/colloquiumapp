<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomsIdShouldBeNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop room_id
        Schema::table('colloquia', function(Blueprint $table) {
            $table->dropForeign('colloquia_room_id_foreign');
            $table->dropColumn('room_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Restore room_id
        Schema::table('colloquia', function(Blueprint $table) {
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }
}
