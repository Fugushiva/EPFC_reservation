<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Price;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Price::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $dataset = [
            [
                'type' => 'Adult',
                'price' => '20',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],
            [
                'type' => 'children',
                'price' => '10',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],
            [
                'type' => 'elder',
                'price' => '15',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],

        ];

        DB::table('prices')->insert($dataset);
    }
}
