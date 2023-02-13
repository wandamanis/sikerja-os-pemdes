<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kinerja;
use Illuminate\Support\Facades\DB;

class KinerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kinerja::create([
            'id_user' => 4,
            'id_sub' => 2,
            'id_status' => 1,
            'kinerja' => 'Testing Prodeskel',
            'tgl_mulai' => '2022-01-11',
            'tgl_selesai' => '2022-01-11',
            'jam_mulai' => '08:30',
            'jam_selesai' => '10:30',
        ]);

        Kinerja::create([
            'id_user' => 4,
            'id_sub' => 2,
            'id_status' => 1,
            'kinerja' => 'Membuat Surat Nota Dinas',
            'tgl_mulai' => '2022-01-11',
            'tgl_selesai' => '2022-01-11',
            'jam_mulai' => '10:30',
            'jam_selesai' => '11:30',
        ]);
    }
}
