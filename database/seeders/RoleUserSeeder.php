<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('role_user')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $dataset = [
            ['login' => 'bob', 'role' => 'member'],
            ['login' => 'anna', 'role' => 'member'],
            ['login' => 'jerome', 'role' => 'admin'],
        ];

        foreach($dataset as &$record){
            $user = User::where([
               ['login', '=', $record['login']]
            ])->first();
            $role = Role::where([
                ['role', '=', $record['role']]
            ])->first();

            $record['user_id'] = $user->id;
            $record['role_id'] = $role->id;

            unset($record['login']);
            unset($record['role']);
        }

        DB::table('role_user')->insert($dataset);



    }
}
