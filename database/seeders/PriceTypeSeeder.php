<?php

namespace Database\Seeders;

use App\Models\PriceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        PriceType::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $dataset = [
            ['type' => 'étudiant'],
            ['type' => 'défaut'],
            ['type' => 'retraîté'],
            ['type' => 'promos']
        ];

        DB::table('price_types')->insert($dataset);
    }


}
