<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = [
            [
                'username' => 'sysadmin',
                'name' => 'SYSTEM ADMINISTRATOR',
                'email' => 'sysadmin@gmail.com',
                'password' => Hash::make('12345678'),
                'id_sub' => 1,
                'id_jab' => 1,
                'id_unit' => 1,
                'id_level' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'sek_kasubbag_rt',
                'name' => 'sek_kasubbag_rt',
                'email' => 'sek_kasubbag_rt@gmail.com',
                'password' => Hash::make('sek_kasubbag_rt'),
                'id_sub' => 2,
                'id_jab' => 3,
                'id_unit' => 7,
                'id_level' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'sek_staf_subbag_rt_1',
                'name' => 'sek_staf_subbag_rt_1',
                'email' => 'sek_staf_subbag_rt_1@gmail.com',
                'password' => Hash::make('sek_staf_subbag_rt_1'),
                'id_sub' => 2,
                'id_jab' => 6,
                'id_unit' => 7,
                'id_level' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'username' => 'sek_staf_subbag_rt_2',
                'name' => 'sek_staf_subbag_rt_2',
                'email' => 'sek_staf_subbag_rt_2@gmail.com',
                'password' => Hash::make('sek_staf_subbag_rt_2'),
                'id_sub' => 2,
                'id_jab' => 6,
                'id_unit' => 7,
                'id_level' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('users')->delete();
        
        User::insert($user);
    }
}
