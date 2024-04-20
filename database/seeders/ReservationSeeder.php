<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Reservation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $dataset = [
            [
                'login' => 'jerome',
                'booking_date' => new DateTime('2023-09-20 15:00:00'),
                'status' => 'draft'
            ],
            [
                'login' => 'jerome',
                'booking_date' => new DateTime('2023-08-20 16:00:00'),
                'status' => 'draft'
            ],
            [
                'login' => 'anna',
                'booking_date' => new DateTime('2023-08-16 18:27:00'),
                'status' => 'draft'
            ],
            [
                'login' => 'bob',
                'booking_date' => new DateTime('2024-03-26 16:15:00'),
                'status' => 'draft'
            ],
        ];

        foreach ($dataset as &$data){
            $user = User::where([
                ['login', '=', $data['login']]
            ])->first();

            $data['user_id'] = $user->id;

            unset($data['login']);
        }

        DB::table('reservations')->insert($dataset);
    }
}
