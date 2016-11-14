<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompanyurlAndCompanyCompanyimageNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('colloquia', function(Blueprint $table) {
            $table->string('company_url')->nullable()->change();
            $table->string('company_image')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('colloquia', function(Blueprint $table) {
            $table->string('company_url')->change();
            $table->string('company_image')->change();
        });
    }
}
