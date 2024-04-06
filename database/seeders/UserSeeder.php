<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        //Empty the table first
        User::truncate();

         DB::statement('SET FOREIGN_KEY_CHECKS=1');

        //Define data
        $users = [
            [
                'login'=>'bob',
                'firstname'=>'Bob',
                'lastname'=>'Sull',
                'email'=>'bob@sull.com',
                'password'=>'epfc',
                'langue'=>'fr',
                'created_at'=>'',
            ],
            [
                'login'=>'anna',
                'firstname'=>'Anna',
                'lastname'=>'Lyse',
                'email'=>'anna.lyse@sull.com',
                'password'=>'epfc',
                'langue'=>'en',
                'created_at'=>'',
            ],
            [
                'login'=>'jerome',
                'firstname'=>'jerome',
                'lastname'=>'delodder',
                'email'=>'jeromedelodder90@gmail.com',
                'password'=>'epfc',
                'langue'=>'fr',
                'created_at'=>'',
            ]
        ];

        foreach($users as &$user) {
            $user['created_at'] = Carbon::now()->toDateTimeString();    //date('Y-m-d G:i:s');
            $user['password'] = Hash::make($user['password']);
        }

        //Insert data in the table
        DB::table('users')->insert($users);

    }
}
