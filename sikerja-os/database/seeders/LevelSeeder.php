<?php

namespace Database\Seeders;

use App\Models\Level;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            [
                'level' => 'System Administrator',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'level' => 'Approver',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'level' => 'Employee',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('levels')->delete();
        Level::insert($level);
    }
}
