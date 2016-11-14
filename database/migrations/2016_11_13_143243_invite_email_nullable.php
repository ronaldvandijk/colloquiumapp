<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InviteEmailNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Make invite_email nullable
        Schema::table('colloquia', function(Blueprint $table) {
            $table->mediumText('invite_email')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Unmake invite email nullable
        Schema::table('colloquia', function(Blueprint $table) {
            $table->mediumText('invite_email')->change();
        });
    }
}
