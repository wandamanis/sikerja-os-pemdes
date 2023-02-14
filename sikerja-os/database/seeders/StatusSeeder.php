<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

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
            ['status' => 'Belum Disetujui'],
            ['status' => 'Telah Disetujui'],
            ['status' => 'Ditolak'],
        ];

        Status::insert($status);
    }
}
