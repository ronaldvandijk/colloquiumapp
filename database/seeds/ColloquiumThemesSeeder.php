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
        $allThemes = \App\Models\Theme::all();

        for($i = 0; $i <= rand(0, 24); $i++)
        {
            $coll = $allColloquia[rand(0, count($allColloquia) -1)];
            $theme = $allThemes[rand(0, count($allThemes) -1)];

            \App\Models\ColloquiumTheme::create([
                'colloquium_id' => $coll->id,
                'theme_id' => $theme->id
            ]);

//            try {
//
//            } catch(Exception $e) {
//                dd($e);
//            }
        }
    }
}
