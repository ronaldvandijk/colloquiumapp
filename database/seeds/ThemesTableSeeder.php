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
            'color' => '#4286f4',
        ]);

        DB::table('themes')->insert([
            'name' => 'AI',
            'color' => '#f4d942',
        ]);

        DB::table('themes')->insert([
            'name' => 'TI',
            'color' => '#86f442',
        ]);
    }
}
