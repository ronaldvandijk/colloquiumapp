<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColloquiumThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colloquium_themes', function (Blueprint $table) {
            $table->integer('colloquium_id')->unsigned();
            $table->integer('theme_id')->unsigned();

            $table->primary(['colloquium_id', 'theme_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colloquium_themes');
    }
}
