<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableColloquiaApprovalNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('colloquia', function ($table) {
            $table->dropColumn('approval');
            $table->boolean('approved')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colloquia', function ($table) {
            $table->dropColumn('approved');
            $table->boolean('approval');

        });
    }
}
