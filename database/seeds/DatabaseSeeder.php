<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(CitiesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(BuildingsTableSeeder::class);
        $this->call(RoomsTableSeeder::class);

        $this->call(LanguagesTableSeeder::class);
        $this->call(ThemesTableSeeder::class);

        $this->call(ColloquiumTypesTableSeeder::class);
        $this->call(ColloquiaTableSeeder::class);
        $this->call(ColloquiumThemesSeeder::class);

    }
}
