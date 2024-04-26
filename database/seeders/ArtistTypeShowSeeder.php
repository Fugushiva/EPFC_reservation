<?php

namespace Database\Seeders;

use App\Models\Show;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtistTypeShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('artist_type_show')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //array
        $showsId = Show::all()->pluck('id')->toArray();;
        //collection
        $typesId = Type::all('id');
        $dataset = [];
        foreach ($typesId as $type_id){
            array_push($dataset, ['artist_type_id' => $type_id->id, 'show_id' => null]);
        }

        foreach ($dataset as &$data){
            $randomShowId = $showsId[array_rand($showsId)];
            $data['show_id'] = $randomShowId;
        }

        DB::table('artist_type_show')->insert($dataset);

    }
}
