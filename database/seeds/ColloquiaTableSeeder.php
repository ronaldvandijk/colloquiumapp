<?php

use Illuminate\Database\Seeder;

class ColloquiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Colloquium::class, 10)->create();
    }
}
