<?php

namespace Database\Seeders;

use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = [
            [
                'status' => 'Belum Disetujui',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'status' => 'Telah Disetujui',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'status' => 'Ditolak',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('statuses')->delete();
        Status::insert($status);
    }
}
