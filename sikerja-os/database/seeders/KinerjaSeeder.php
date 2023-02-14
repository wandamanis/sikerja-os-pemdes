<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kinerja;
use Carbon\Carbon;
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
        $employee_1 = [
            [
                'id_user' => 3,
                'id_sub' => 2,
                'id_status' => 1,
                'kinerja' => 'Membuat Nota Dinas',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 3,
                'id_sub' => 2,
                'id_status' => 1,
                'kinerja' => 'Membuat Rekapitulasi Kegiatan Triwulanan',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 3,
                'id_sub' => 2,
                'id_status' => 2,
                'kinerja' => 'Melaporakan dan membuat notula Rapat Persiapan Pelaksanaan Rakornas',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 3,
                'id_sub' => 2,
                'id_status' => 3,
                'kinerja' => 'Melakukan koordinasi penyelesaian SPJ',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $employee_2 = [
            [
                'id_user' => 4,
                'id_sub' => 2,
                'id_status' => 1,
                'kinerja' => 'Melaporkan hasil perjalanan dinas secara lisan dan tertulis',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 4,
                'id_sub' => 2,
                'id_status' => 2,
                'kinerja' => 'Melakukan rekapitulasi SPJ yang telah direalisasikan',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 4,
                'id_sub' => 2,
                'id_status' => 2,
                'kinerja' => 'Menghadiri Zoom Meeting terkait Sosialisasi Permendagri no. 137 tahun 2022',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'id_user' => 4,
                'id_sub' => 2,
                'id_status' => 3,
                'kinerja' => 'Mengikuti Upacara',
                'tgl_mulai' => '2022-01-11',
                'tgl_selesai' => '2022-01-11',
                'jam_mulai' => '08:30',
                'jam_selesai' => '10:30',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('kinerjas')->delete();

        Kinerja::insert($employee_1);
        Kinerja::insert($employee_2);

    }
}
