<?php

namespace Database\Seeders;

use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit = [
            [
                'unit' => '1. Direktorat PAPD',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'unit' => '2. Direktorat FPKAPD',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'unit' => '3. Direktorat FKLPDBPD',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'unit' => '4. Direktorat FLMADPKKPPT',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'unit' => '5. Direktorat PKPDDEPD',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'unit' => '6. Sekretariat',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $sysadmin = [
            [
                'unit' => 'SYSTEM ADMINISTRATOR',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('units')->delete();
        Unit::insert($sysadmin);
        Unit::insert($unit);
    }
}
