<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Locality::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $dataset = [
            ['postal_code' => 1000, 'locality' => 'Bruxelles'],
            ['postal_code' => 2000, 'locality' => 'Anvers'],
            ['postal_code' => 3000, 'locality' => 'Louvain'],
            ['postal_code' => 4000, 'locality' => 'Liège'],
            ['postal_code' => 5000, 'locality' => 'Namur'],
            ['postal_code' => 6000, 'locality' => 'Charleroi'],
            ['postal_code' => 7000, 'locality' => 'Mons'],
            ['postal_code' => 8000, 'locality' => 'Bruges'],
            ['postal_code' => 9000, 'locality' => 'Gand'],
        ];
        DB::table('localities')->insert($dataset);
    }
}
