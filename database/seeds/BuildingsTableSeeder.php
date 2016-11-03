<?php

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buildings')->insert([
            'name' => 'Van dorenveste',
            'abbreviation' => 'TN',
            'location_id' => 1,
        ]);

        DB::table('buildings')->insert([
            'name' => 'Van olstoren',
            'abbreviation' => 'EM',
            'location_id' => 1,
        ]);
    }
}
