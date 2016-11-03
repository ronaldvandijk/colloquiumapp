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
            'abreviation' => 'TN',
            'location_id' => 1,
        ]);

        DB::table('buildings')->insert([
            'name' => 'Van olstoren',
            'abreviation' => 'EM',
            'location_id' => 1,
        ]);
    }
}
