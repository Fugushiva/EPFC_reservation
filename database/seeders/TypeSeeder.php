<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Type::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $dataset = [
            ['type' => 'auteur'],
            ['type' => 'scénographe'],
            ['type' => 'comédien'],
            ['type' => 'réalisateur'],
            ['type' => 'danseur'],
            ['type' => 'chanteur'],
            ['type' => 'chargé de production'],
            ['type' => 'costumier'],
            ['type' => 'perchman'],
            ['type' => 'régisseur'],
            ['type' => 'éclairagiste'],
        ];

        DB::table('types')->insert($dataset);
    }

}
