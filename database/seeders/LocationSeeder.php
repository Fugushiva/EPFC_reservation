<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Location::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $dataset = [
            [
                'designation' => 'Bruxelles',
                'address' => 'Rue des lauriers 255',
                'phone' => '0697854214'
            ],
            [
                'designation' => 'Liège',
                'address' => 'Avenue des templiers',
                'phone' => '025657815228'
            ],
            [
                'designation' => 'Namur',
                'address' => "Place d'arme",
                'phone' => '028974522145'
            ],
            [
                'designation' => 'Bruxelles',
                'address' => "Place des arts",
                'phone' => '02654855214'
            ],
            [
            'designation' => 'Grand duç é l@ où',
            'address' => "Place des arts",
            'phone' => '02654855214'
        ]

        ];

        foreach($dataset as &$data){
            $data['slug'] = toSlug($data['designation']);
        }

        DB::table('locations')->insert($dataset);
    }
}
