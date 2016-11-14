i<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'User',
        ]);

        DB::table('roles')->insert([
            'name' => 'Examinator',
        ]);

        DB::table('roles')->insert([
            'name' => 'Planner',
        ]);

        DB::table('roles')->insert([
            'name' => 'Administrator',
        ]);
    }
}
