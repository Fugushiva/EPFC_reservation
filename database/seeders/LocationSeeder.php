<?php

namespace Database\Seeders;

use App\Models\Locality;
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
                'designation' => 'Forest National',
                'postal_code' => "1190",
                'address' => 'Av. Victor Rousseau 208',
                'phone' => '034006970',
                'website' => 'https://www.forest-national.be/',
                'picture_url' => 'https://scontent-bru2-1.xx.fbcdn.net/v/t1.6435-9/66702105_10157209420509647_8469109817569443840_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=5f2048&_nc_ohc=j5BRludKBGQAb65sfLT&_nc_ht=scontent-bru2-1.xx&oh=00_AfBwR8eDJbBZIosyySKtHdFRc89uTmeNBgD994vecvKK-w&oe=663A25CB'


            ],
            [
                'designation' => 'Ancienne Belgique',
                'postal_code' => "1000",
                'address' => 'Bd Anspach 110, 1000 Bruxelles',
                'phone' => '02 548 24 84',
                'website' => 'https://www.abconcerts.be/fr/',
                'picture_url' => 'https://jazzmania.be/wp-content/uploads/2020/10/Photo-AB.jpg'
            ],
            [
                'designation' => 'Botanique',
                'postal_code' => "1210",
                'address' => "Jardin botanique de Bruxelles",
                'phone' => '+32(2)218 37 32',
                'website' => 'https://botanique.be/fr',
                'picture_url' => 'https://arkadia.be/sites/default/files/styles/w1440/public/2023-07/Botanique_03.JPG.webp?itok=Gul5rVBk'
            ],
            [
                'designation' => 'Palais des Beaux-Arts',
                'postal_code' => "6000",
                'address' => "Place du manège 1",
                'phone' => '071321212',
                'website' => 'https://www.pba.be/',
                'picture_url' => 'https://upload.wikimedia.org/wikipedia/commons/7/72/Charleroi_-_Palais_des_Beaux-Arts_-_2023-08-07_-_01.jpg'
            ],
            [
                'designation' => 'Le Forum',
                'postal_code' => "4000",
                'address' => " Rue Pont d'Avroy 12/14",
                'phone' => '04 223 18 18',
                'website' => 'https://www.leforum.be/',
                'picture_url' => 'https://www.lavenir.net/resizer/aug1aDn_NIiUlvS30fgUMv667Oo=/768x512/filters:format(jpeg):focal(544.5x371.5:554.5x361.5)/cloudfront-eu-central-1.images.arcpublishing.com/ipmgroup/46KKQNEF2BB5XKKE3K5YNX2CWU.jpg'
            ]

        ];

        foreach ($dataset as &$data) {
            $locality = Locality::where([
                ['postal_code', '=', $data['postal_code']]
            ])->first();
            $data['locality_id'] = $locality->id;
            $data['slug'] = toSlug($data['designation']);

            unset($data['postal_code']);
        }

        DB::table('locations')->insert($dataset);
    }
}
