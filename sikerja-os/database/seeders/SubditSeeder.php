<?php

namespace Database\Seeders;

use App\Models\Subdit;
use Illuminate\Database\Seeder;

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
            ['jabatan' => 'Bagian Umum'],
            ['jabatan' => 'Bagian Keuangan'],
            ['jabatan' => 'Bagian Perencanaan'],
            ['jabatan' => 'Kepala Bagian Perundang-undangan'],
        ];

        // dit 1
        $dit_papd = [
            ['jabatan' => 'Subdit Fasilitasi Penataan Wilayah Desa'],
            ['jabatan' => 'Subdit Fasilitasi Penataan Kewenangan dan Produk Hukum Desa'],
            ['jabatan' => 'Subdit Fasilitasi Administrasi Pemerintahan Desa'],
        ];

        //dit 2
        $dit_fpkapd = [
            ['jabatan' => 'Subdit Fasilitasi Pengelolaan Perencanaan Pembangunan Desa'],
            ['jabatan' => 'Subdit Fasilitasi Pengelolaan Keuangan Desa'],
            ['jabatan' => 'Subdit Fasilitasi Pengelolaan Aset Desa'],
        ];

        //dit 3
        $dit_fklpdbpd = [
            ['jabatan' => 'Subdit Fasilitasi Kerja Sama Desa'],
            ['jabatan' => 'Subdit Fasilitasi Lembaga Pemerintahan Desa dan Badan Permusyawaratan Desa'],
        ];

        //dit 4
        $dit_flmadpkkppt = [
            ['jabatan' => 'Subdit Fasilitasi Lembaga Kemasyarakatan dan Adat Desa'],
            ['jabatan' => 'Subdit Fasilitasi Lembaga Pemberdayaan Kesejahteraan Keluarga'],
            ['jabatan' => 'Subdit Fasilitasi Lembaga Pos Layanan Terpadu'],
        ];

        //dit 5
        $dit_pkpddepd = [
            ['jabatan' => 'Subdit Pengembangan Kapasitas Pemerintahan Desa'],
            ['jabatan' => 'Subdit Fasilitasi Pengelolaan Data dan Informasi Desa'],
            ['jabatan' => 'Subdit Evaluasi Perkembangan Desa'],
        ];

        Subdit::insert($sekretariat);
        Subdit::insert($dit_papd);
        Subdit::insert($dit_fpkapd);
        Subdit::insert($dit_fklpdbpd);
        Subdit::insert($dit_flmadpkkppt);
        Subdit::insert($dit_pkpddepd);
    }
}
