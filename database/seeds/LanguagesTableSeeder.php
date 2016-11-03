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
            'name' => 'Nederlands',
        ]);

        DB::table('languages')->insert([
            'name' => 'Engels',
        ]);

        DB::table('languages')->insert([
            'name' => 'Frans',
        ]);
    }
}
