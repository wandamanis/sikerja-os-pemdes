<?php

namespace Database\Seeders;

use App\Models\Subdit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sekretariat = [
            [
                'subdit' => 'Bagian Umum',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Bagian Keuangan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Bagian Perencanaan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Bagian Perundang-undangan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        // dit 1
        $dit_papd = [
            [
                'subdit' => 'Subdit Fasilitasi Penataan Wilayah Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Penataan Kewenangan dan Produk Hukum Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Administrasi Pemerintahan Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        //dit 2
        $dit_fpkapd = [
            [
                'subdit' => 'Subdit Fasilitasi Pengelolaan Perencanaan Pembangunan Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Pengelolaan Keuangan Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Pengelolaan Aset Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        //dit 3
        $dit_fklpdbpd = [
            [
                'subdit' => 'Subdit Fasilitasi Kerja Sama Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Lembaga Pemerintahan Desa dan Badan Permusyawaratan Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        //dit 4
        $dit_flmadpkkppt = [
            [
                'subdit' => 'Subdit Fasilitasi Lembaga Kemasyarakatan dan Adat Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Lembaga Pemberdayaan Kesejahteraan Keluarga',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Lembaga Pos Layanan Terpadu',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        //dit 5
        $dit_pkpddepd = [
            [
                'subdit' => 'Subdit Pengembangan Kapasitas Pemerintahan Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Fasilitasi Pengelolaan Data dan Informasi Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'subdit' => 'Subdit Evaluasi Perkembangan Desa',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $sysadmin = [
            [
                'subdit' => 'SYSTEM ADMINISTRATOR',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        DB::table('subdits')->delete();

        Subdit::insert($sysadmin);
        
        Subdit::insert($sekretariat);
        Subdit::insert($dit_papd);
        Subdit::insert($dit_fpkapd);
        Subdit::insert($dit_fklpdbpd);
        Subdit::insert($dit_flmadpkkppt);
        Subdit::insert($dit_pkpddepd);
    }
}
