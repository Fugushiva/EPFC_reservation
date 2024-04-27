<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Locality;
use App\Models\Representation;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            Artistseeder::class,
            UserSeeder::class,
            ProvinceSeeder::class,
            LocalitySeeder::class,
            TypeSeeder::class,
            ArtistTypeSeeder::class,
            ShowSeeder::class,
            LocationSeeder::class,
            RoleSeeder::class,
            RoleUserSeeder::class,
            RepresentationSeeder::class,
            ReservationSeeder::class,
            PriceSeeder::class,
            ReprensentationReservationSeeder::class,
            ArtistTypeShowSeeder::class,
        ]);
    }
}
