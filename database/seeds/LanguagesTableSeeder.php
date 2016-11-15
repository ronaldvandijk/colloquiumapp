<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'Dutch',
        ]);

        DB::table('languages')->insert([
            'name' => 'English',
        ]);

        DB::table('languages')->insert([
            'name' => 'French',
        ]);
    }
}
