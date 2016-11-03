<?php

use Illuminate\Database\Seeder;

class ColloquiumTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colloquium_types')->insert([
            'name' => 'Final Exam',
        ]);

        DB::table('colloquium_types')->insert([
            'name' => 'Internship',
        ]);

    }
}
