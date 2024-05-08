<?php

namespace Database\Seeders;

use App\Models\PriceType;
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
                'type' => 'défaut',
                'price' => '20',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],
            [
                'type' => 'promos',
                'price' => '10',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],
            [
                'type' => 'étudiant',
                'price' => '15',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],
            [
                'type' => 'retraîté',
                'price' => '8',
                'start_date' => new DateTime('2023-11-23'),
                'end_date' => new DateTime('2024-02-09')
            ],


        ];

        foreach($dataset as &$data){
            $type = PriceType::where([
                ['type', '=', $data['type']]
            ])->first();

            $data['price_type_id'] = $type->id;

            unset($data['type']);
        }

        DB::table('prices')->insert($dataset);
    }
}
