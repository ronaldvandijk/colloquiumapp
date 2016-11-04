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

        factory(App\User::class, 10)->create();
    }
}
