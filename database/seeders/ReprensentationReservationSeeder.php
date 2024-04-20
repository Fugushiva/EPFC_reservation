<?php

namespace Database\Seeders;

use App\Models\Price;
use App\Models\Representation;
use App\Models\Reservation;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RepresentationReservation;
use Illuminate\Support\Facades\DB;

class ReprensentationReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        RepresentationReservation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        $dataset = [
            [
                //representation
                'schedule' => new DateTime('2024-11-15 15:00:00'),
                //reservation
                'booking_date' => new DateTime('2023-09-20 15:00:00'),
                //price
                'type' => 'défaut',
                'quantity' => '2'
            ],
            [
                //representation
                'schedule' => new DateTime('2024-08-05 17:00:00'),
                //reservation
                'booking_date' => new DateTime('2023-08-16 18:27:00'),
                //price
                'type' => 'promos',
                'quantity' => '1'
            ],
            [
                //representation
                'schedule' => new DateTime('2024-08-09 15:30:00'),
                //reservation
                'booking_date' => new DateTime('2024-03-26 16:15:00'),
                //price
                'type' => 'étudiant',
                'quantity' => '1'
            ],
            [
                //representation
                'schedule' => new DateTime('2024-08-09 15:30:00'),
                //reservation
                'booking_date' => new DateTime('2023-08-20 16:00:00'),
                //price
                'type' => 'défaut',
                'quantity' => '1'
            ],
        ];

        foreach($dataset as &$data){
            $representation = Representation::where([
               ['schedule', '=', $data['schedule']]
            ])->first();
            $reservation = Reservation::where([
               ['booking_date', '=', $data['booking_date']]
            ])->first();
            $price = Price::where([
               ['type', '=', $data['type']]
            ])->first();

            $data['representation_id'] = $representation->id;
            $data['reservation_id'] = $reservation->id;
            $data['price_id'] = $price->id;

            unset($data['schedule']);
            unset($data['booking_date']);
            unset($data['type']);
        }

        DB::table('representation_reservation')->insert($dataset);
    }
}
