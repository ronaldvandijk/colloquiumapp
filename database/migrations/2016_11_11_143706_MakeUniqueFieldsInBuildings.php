<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeUniqueFieldsInBuildings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buildings', function($table)
        {
            $table->unique(['name', 'abbreviation'], 'NameAbbreviationCombination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('buildings', function($table)
        {
            $table->dropUnique('NameAbbreviationCombination');
        });
    }
}
