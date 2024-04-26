<?php

namespace Database\Seeders;

use App\Models\Type;
use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\ArtistType;

class ArtistTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        ArtistType::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $types = Type::all()->pluck('type')->toArray();

        $dataset = [
            ['firstname' => 'Daniel', 'lastname' => 'Marcelin'],
            ['firstname' => 'Daniel', 'lastname' => 'Marcelin'],
            ['firstname' => 'Daniel', 'lastname' => 'Marcelin',],
            ['firstname' => 'Olivier', 'lastname' => 'Boudon',],
            ['firstname' => 'Laurent', 'lastname' => 'Caron',],
            ['firstname' => 'Daniel', 'lastname' => 'marcelin',],
            ['firstname' => 'Laurent', 'lastname' => 'Caron',],
            ['firstname' => 'Daniel', 'lastname' => 'Marcelin'],
            ['firstname' => 'Philippe', 'lastname' => 'Laurent'],
            ['firstname' => 'Marius', 'lastname' => 'Von Mayenburg'],
            ['firstname' => 'Olivier', 'lastname' => 'Boudon'],
            ['firstname' => 'Anne Marie', 'lastname' => 'Loop'],
            ['firstname' => 'Pietro', 'lastname' => 'Varasso'],
            ['firstname' => 'Laurent', 'lastname' => 'Caron'],
            ['firstname' => 'Élena', 'lastname' => 'Perez'],
            ['firstname' => 'Guillaume', 'lastname' => 'Alexandre'],
            ['firstname' => 'Claude', 'lastname' => 'Semal'],
            ['firstname' => 'Laurence', 'lastname' => 'Warin'],

        ];
        foreach ($dataset as &$record) {
            $artist = Artist::where([
                ['firstname', '=', $record['firstname']],
                ['lastname', '=', $record['lastname']],
            ])->first();

            $randomType = $types[array_rand($types)];
            $type = Type::where('type', $randomType)->first();

            $record['artist_id'] = $artist->id;
            $record['type_id'] = $type->id;
            unset($record['firstname']);
            unset($record['lastname']);

        }
        DB::table('artist_types')->insert($dataset);
    }
}
