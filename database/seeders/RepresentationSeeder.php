<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Representation;
use App\Models\Show;
use DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        Representation::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $dataset = [
            [
                'title' => 'Goldmen Tribute 100% Goldman - Tournée 2024/2025',
                'schedule' => new DateTime('2024-11-15 15:00:00'),
                'designation' => 'Forest National'
            ],
            [
                'title' => 'Goldmen Tribute 100% Goldman - Tournée 2024/2025',
                'schedule' => new DateTime('2024-11-14 20:00:00'),
                'designation' => 'Forest National'
            ],
            [
                'title' => 'Goldmen Tribute 100% Goldman - Tournée 2024/2025',
                'schedule' => new DateTime('2024-07-22 18:30:00'),
                'designation' => 'Ancienne Belgique'
            ],
            [
                'title' => 'Le Lac des Cygnes - Ballet & Orchestre - Tournée 2024',
                'schedule' => new DateTime('2024-08-05 17:00:00'),
                'designation' => 'Le Forum'
            ],
            [
                'title' => 'Stories La Dernière Tournée - Tournée',
                'schedule' => new DateTime('2024-08-09 15:30:00'),
                'designation' => 'Palais des Beaux-Arts'
            ],
            [
                'title' => 'Stories La Dernière Tournée - Tournée',
                'schedule' => new DateTime('2024-10-15 19:00:00'),
                'designation' => 'Le Forum'
            ],

        ];

        foreach($dataset as &$data){
            $show = Show::where([
               ['title', '=', $data['title']],
            ])->first();
            $location = Location::where([
                ['designation', '=', $data['designation']],
            ])->first();

            $data['show_id'] = $show->id;
            $data['location_id'] = $location->id;

            unset($data['title']);
            unset($data['designation']);
        }

        DB::table('representations')->insert($dataset);
    }
}
