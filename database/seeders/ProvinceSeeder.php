<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Province::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


        $dataset = [
            ['name' => 'Anvers'],
            ['name' => 'Flandre-Orientale'],
            ['name' => 'Limbourg'],
            ['name' => 'Flandre-Occidentale'],
            ['name' => 'Brabant flamand'],
            ['name' => 'Hainaut'],
            ['name' => 'Luxembourg'],
            ['name' => 'Brabant wallon'],
            ['name' => 'Liège'],
            ['name' => 'Namur'],
            ['name' => 'Bruxelles'],
        ];

        DB::table('provinces')->insert($dataset);
    }
}
