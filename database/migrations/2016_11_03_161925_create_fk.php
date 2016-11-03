<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->foreign('role_id')->references('id')->on('roles');

        });

        Schema::table('colloquia', function ($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->foreign('type_id')->references('id')->on('colloquium_types');
            $table->foreign('language_id')->references('id')->on('languages');

        });

        Schema::table('invitees', function ($table) {
            $table->foreign('colloquium_id')->references('id')->on('colloquia');

        });

        Schema::table('rooms', function ($table) {
            $table->foreign('building_id')->references('id')->on('buildings');

        });

        Schema::table('buildings', function ($table) {
            $table->foreign('location_id')->references('id')->on('locations');

        });

        Schema::table('locations', function ($table) {
            $table->foreign('city_id')->references('id')->on('cities');

        });

        Schema::table('colloquium_examinators', function ($table) {
            $table->foreign('colloquium_id')->references('id')->on('colloquia');
            $table->foreign('user_id')->references('id')->on('users');

        });

        Schema::table('colloquium_users', function ($table) {
            $table->foreign('colloquium_id')->references('id')->on('colloquia');
            $table->foreign('user_id')->references('id')->on('users');

        });

        Schema::table('colloquium_themes', function ($table) {
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('colloquium_id')->references('id')->on('colloquia');

        });

        Schema::table('theme_users', function ($table) {
            $table->foreign('theme_id')->references('id')->on('themes');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop FK for users table
        Schema::table('users', function ($table) {
            $table->dropForeign('users_role_id_foreign');
        });

        //drop FK for colloquia table
        Schema::table('colloquia', function ($table) {
            $table->dropForeign('colloquia_user_id_foreign');
            $table->dropForeign('colloquia_room_id_foreign');
            $table->dropForeign('colloquia_type_id_foreign');
            $table->dropForeign('colloquia_language_id_foreign');
        });

        //drop FK for invitees table
        Schema::table('invitees', function ($table) {
            $table->dropForeign('invitees_colloquium_id_foreign');
        });

        //drop FK for rooms table
        Schema::table('rooms', function ($table) {
            $table->dropForeign('rooms_building_id_foreign');
        });

        //drop FK for buildings table
        Schema::table('buildings', function ($table) {
            $table->dropForeign('buildings_location_id_foreign');
        });

        Schema::table('locations', function ($table) {
        //drop FK for locations table
            $table->dropForeign('locations_city_id_foreign');
        });

        //drop FK for colloquium_examinators table
        Schema::table('colloquium_examinators', function ($table) {        
            $table->dropForeign('colloquium_examinators_colloquium_id_foreign');
            $table->dropForeign('colloquium_examinators_user_id_foreign');
        });


        //drop FK for colloquium_users table
        Schema::table('colloquium_users', function ($table) {
            $table->dropForeign('colloquium_users_colloquium_id_foreign');
            $table->dropForeign('colloquium_users_user_id_foreign');
        });

        //drop FK for colloquium_themes table
        Schema::table('colloquium_themes', function ($table) {
            $table->dropForeign('colloquium_themes_theme_id_foreign');
            $table->dropForeign('colloquium_themes_colloquium_id_foreign');
        });


        //drop FK for theme_users table
        Schema::table('theme_users', function ($table) {
            $table->dropForeign('theme_users_theme_id_foreign');
            $table->dropForeign('theme_users_user_id_foreign');
        });
    }
}
