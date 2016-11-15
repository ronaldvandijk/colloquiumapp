<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create a default  "admin" account!
        \App\Models\User::create([
            'first_name' => 'Admin',
            'insertion' => '',
            'last_name' => 'istrator',
            'email' => 'admin@colloquium.app',
            'password' => bcrypt('123123123'),
            'verified' => '1',
            'role_id' => '4',
            'enabled' => '1',
            'prefered_language' => 'nl',
            'image' => ''
        ]);


        // Create a default "user" account!
        \App\Models\User::create([
            'first_name' => 'Sander',
            'insertion' => 'van',
            'last_name' => 'Doorn-Kasteel',
            'email' => 'user@colloquium.app',
            'password' => bcrypt('123123123'),
            'verified' => '1',
            'role_id' => '1',
            'enabled' => '1',
            'prefered_language' => 'nl',
            'image' => '/images/users/IMG_20161115_112951.jpg'
        ]);

        \App\Models\User::create([
            'first_name' => 'Planner',
            'insertion' => '',
            'last_name' => 'Planner User',
            'email' => 'planner@colloquium.app',
            'password' => bcrypt('123123123'),
            'verified' => '1',
            'role_id' => '3',
            'enabled' => '1',
            'prefered_language' => 'nl',
            'image' => ''
        ]);

        factory(App\Models\User::class, 10)->create();
    }
}
