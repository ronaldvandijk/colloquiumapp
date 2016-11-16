<?php

use Illuminate\Database\Seeder;

class ColloquiumThemesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allColloquia = \App\Models\Colloquium::all();
        $allThemes = \App\Models\Theme::all()->toArray();

        foreach ($allColloquia as $colloquia) 
        {
            shuffle($allThemes);
            for($i = 0; $i <= rand(0, count($allThemes) -1); $i++)
            {
                \App\Models\ColloquiumTheme::create([
                    'colloquium_id' => $colloquia->id,
                    'theme_id' => $allThemes[$i]['id']
                ]);
            }
        }
    }
}
