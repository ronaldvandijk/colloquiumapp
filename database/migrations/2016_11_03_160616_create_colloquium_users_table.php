<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColloquiumUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colloquium_users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('colloquium_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['colloquium_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colloquium_users');
    }
}
