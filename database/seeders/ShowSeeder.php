<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Show;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Show::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $dataset = [
            [

                'title' => 'vent au loin',
                'description' => 'une éloge aux émotions',
                'poster_url' => 'link cool',
                'location_id' => null,
                'bookable' => true,
                'price' => 22,
                'created_at' => date_create('now')
            ],
            [

                'title' => 'La vie des pistaches',
                'description' => 'Les pistaches dans toutes leur sincérités',
                'poster_url' => 'link cool',
                'location_id' => null,
                'bookable' => false,
                'price' => 16,
                'created_at' => date_create('now')
            ],
            [

                'title' => "les moutons d'en bas",
                'description' => "parfois les voisins ne sont pas ce qu'ils sont",
                'poster_url' => 'link cool',
                'location_id' => null,
                'bookable' => true,
                'price' => 30,
                'created_at' => date_create('now')
            ]
        ];

        foreach($dataset as &$show){
            $show['slug'] = toSlug($show['title']);
        }


        DB::table('shows')->insert($dataset);

    }
}
