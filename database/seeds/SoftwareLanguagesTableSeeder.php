<?php

use Illuminate\Database\Seeder;

class SoftwareLanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('software_languages')->insert([
            'directory' => 'en',
            'native' => 'English'
        ]);

        DB::table('software_languages')->insert([
            'directory' => 'nl',
            'native' => 'Nederlands'
        ]);
    }
}
