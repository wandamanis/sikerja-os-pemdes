<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            [
                'jabatan' => 'Kepala Bagian Umum', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Rumah Tangga dan BMN',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Kepegawaian',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Tata Usaha Pimpinan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Umum',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'jabatan' => 'Kepala Bagian Keuangan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Pelaksanaan Anggaran', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Perbendaharaan', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Kepala Sub Bagian Verfikasi dan Akuntansi', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Keuangan', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kepala Bagian Perencanaan', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Perencanaan', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kepala Bagian Perundang-undangan', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Perundang-undangan', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        // dit 1
        $dit_papd = [
            [
                'jabatan' => 'Kasubbag Tata Usaha Dit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi TU Dit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],

            [
                'jabatan' => 'Kasubdit Fasilitasi Penataan Wilayah Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Penataan Kewenangan dan Produk Hukum Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Administrasi Pemerintahan Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 3', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        //dit 2
        $dit_fpkapd = [
            [
                'jabatan' => 'Kasubbag Tata Usaha Dit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi TU Dit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Pengelolaan Perencanaan Pembangunan Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Pengelolaan Keuangan Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Pengelolaan Aset Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 3', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        //dit 3
        $dit_fklpdbpd = [
            [
                'jabatan' => 'Kasubbag Tata Usaha Dit 3', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi TU Dit 3', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Kerja Sama Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Lembaga Pemerintahan Desa dan Badan Permusyawaratan Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        //dit 4
        $dit_flmadpkkppt = [
            [
                'jabatan' => 'Kasubbag Tata Usaha Dit 4', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi TU Dit 4', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Lembaga Kemasyarakatan dan Adat Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Lembaga Pemberdayaan Kesejahteraan Keluarga', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Lembaga Pos Layanan Terpadu', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 3', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        //dit 5
        $dit_pkpddepd = [
            [
                'jabatan' => 'Kasubbag Tata Usaha Dit 5', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi TU Dit 5', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Pengembangan Kapasitas Pemerintahan Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 1', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Fasilitasi Pengelolaan Data dan Informasi Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 2', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            
            [
                'jabatan' => 'Kasubdit Evaluasi Perkembangan Desa', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'jabatan' => 'Tenaga Administrasi Subdit 3', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        $sysadmin = [
            [
                'jabatan' => 'SYSTEM ADMINISTRATOR', 
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
        
        DB::table('jabatans')->delete();

        Jabatan::insert($sysadmin);
        
        Jabatan::insert($sekretariat);
        Jabatan::insert($dit_papd);
        Jabatan::insert($dit_fpkapd);
        Jabatan::insert($dit_fklpdbpd);
        Jabatan::insert($dit_flmadpkkppt);
        Jabatan::insert($dit_pkpddepd);
    }
}
