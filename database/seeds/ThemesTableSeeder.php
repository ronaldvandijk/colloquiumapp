<?php

use Illuminate\Database\Seeder;

class ThemesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('themes')->insert([
            'name' => 'ICT',
        ]);

        DB::table('themes')->insert([
            'name' => 'AI',
        ]);
    }
}
