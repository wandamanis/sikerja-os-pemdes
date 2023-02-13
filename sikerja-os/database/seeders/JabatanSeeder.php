<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    public function run()
    {

        $sekretariat = [
            ['jabatan' => 'Kepala Bagian Umum'],
            ['jabatan' => 'Kepala Sub Bagian Rumah Tangga dan BMN'],
            ['jabatan' => 'Kepala Sub Bagian Kepegawaian'],
            ['jabatan' => 'Kepala Sub Bagian Tata Usaha Pimpinan'],
            ['jabatan' => 'Tenaga Administrasi Umum'],

            ['jabatan' => 'Kepala Bagian Keuangan'],
            ['jabatan' => 'Kepala Sub Bagian Pelaksanaan Anggaran'],
            ['jabatan' => 'Kepala Sub Bagian Perbendaharaan'],
            ['jabatan' => 'Kepala Sub Bagian Verfikasi dan Akuntansi'],
            ['jabatan' => 'Tenaga Administrasi Keuangan'],
            
            ['jabatan' => 'Kepala Bagian Perencanaan'],
            ['jabatan' => 'Tenaga Administrasi Perencanaan'],
            
            ['jabatan' => 'Kepala Bagian Perundang-undangan'],
            ['jabatan' => 'Tenaga Administrasi Perundang-undangan'],
        ];
        
        // dit 1
        $dit_papd = [
            ['jabatan' => 'Kasubbag Tata Usaha Dit 1'],
            ['jabatan' => 'Tenaga Administrasi TU Dit 1'],

            ['jabatan' => 'Kasubdit Fasilitasi Penataan Wilayah Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 1'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Penataan Kewenangan dan Produk Hukum Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 2'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Administrasi Pemerintahan Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 3'],
        ];
        
        //dit 2
        $dit_fpkapd = [
            ['jabatan' => 'Kasubbag Tata Usaha Dit 2'],
            ['jabatan' => 'Tenaga Administrasi TU Dit 2'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Pengelolaan Perencanaan Pembangunan Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 1'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Pengelolaan Keuangan Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 2'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Pengelolaan Aset Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 3'],
        ];
        
        //dit 3
        $dit_fklpdbpd = [
            ['jabatan' => 'Kasubbag Tata Usaha Dit 3'],
            ['jabatan' => 'Tenaga Administrasi TU Dit 3'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Kerja Sama Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 1'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Lembaga Pemerintahan Desa dan Badan Permusyawaratan Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 2'],
        ];
        
        //dit 4
        $dit_flmadpkkppt = [
            ['jabatan' => 'Kasubbag Tata Usaha Dit 4'],
            ['jabatan' => 'Tenaga Administrasi TU Dit 4'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Lembaga Kemasyarakatan dan Adat Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 1'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Lembaga Pemberdayaan Kesejahteraan Keluarga'],
            ['jabatan' => 'Tenaga Administrasi Subdit 2'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Lembaga Pos Layanan Terpadu'],
            ['jabatan' => 'Tenaga Administrasi Subdit 3'],
        ];
        
        //dit 5
        $dit_pkpddepd = [
            ['jabatan' => 'Kasubbag Tata Usaha Dit 5'],
            ['jabatan' => 'Tenaga Administrasi TU Dit 5'],
            
            ['jabatan' => 'Kasubdit Pengembangan Kapasitas Pemerintahan Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 1'],
            
            ['jabatan' => 'Kasubdit Fasilitasi Pengelolaan Data dan Informasi Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 2'],
            
            ['jabatan' => 'Kasubdit Evaluasi Perkembangan Desa'],
            ['jabatan' => 'Tenaga Administrasi Subdit 3'],
        ];
        
        Jabatan::insert($sekretariat);
        Jabatan::insert($dit_papd);
        Jabatan::insert($dit_fpkapd);
        Jabatan::insert($dit_fklpdbpd);
        Jabatan::insert($dit_flmadpkkppt);
        Jabatan::insert($dit_pkpddepd);
    }
}
