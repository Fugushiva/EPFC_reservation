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

                'title' => 'Goldmen Tribute 100% Goldman - Tournée 2024/2025',
                'description' => "Venez-vous fondre dans l’univers de Jean-Jacques GOLDMAN
                                  Le groupe GOLDMEN écume les scènes en défendant fièrement les titres qui ont marqué les années 80, 90 & 2000 que le public connaît par cœur",
                'poster_url' => 'https://www.tours-metropole.fr/sites/default/files/styles/large/public/affiche-goldmen-0.jpg?itok=LqDkZLBn',
                'location_id' => null,
                'bookable' => true,
                'duration' => 40,
                'created_at' => date_create('now')
            ],
            [

                'title' => 'Le Lac des Cygnes - Ballet & Orchestre - Tournée 2024',
                'description' => 'Symbole du ballet romantique, Le Lac des Cygnes envoûte et enchante petits et grands.',
                'poster_url' => 'https://www.marseille-tourisme.com/vivez-marseille-blog/agenda/le-lac-des-cygnes-ballet-et-orchestre-marseille-4eme-fr-4447086/',
                'location_id' => null,
                'bookable' => false,
                'duration' => 60,
                'created_at' => date_create('now')
            ],
            [

                'title' => "Stories La Dernière Tournée - Tournée",
                'description' => "Un hommage éblouissant et moderne à la comédie musicale américaine.",
                'poster_url' => 'https://www.enpaysdelaloire.com/sites/default/files/styles/objet_touristique_full_xs/public/sit/images/FMAPDL072V50TNWR/FMA72-Stories.jpg?h=dbcb1f89&itok=f2jh__78',
                'location_id' => null,
                'bookable' => true,
                'duration' => 30,
                'created_at' => date_create('now')
            ]
        ];

        foreach($dataset as &$show){
            $show['slug'] = toSlug($show['title']);
        }


        DB::table('shows')->insert($dataset);

    }
}
