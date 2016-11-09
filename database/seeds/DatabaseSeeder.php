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
        // Truncate the tables when a db:seed is run
        $this->truncateTables();

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

    private function truncateTables() {
        DB::statement('SET foreign_key_checks = 0');
        // Truncate all tables, except migrations
        $tables = Schema::getConnection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tables as $table) {
            if ($table !== 'migrations') {
                DB::table($table)->truncate();
            }
        }
        DB::statement('SET foreign_key_checks = 1');
    }
}
