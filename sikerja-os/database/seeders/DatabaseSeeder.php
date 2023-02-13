<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Jabatan;
use App\Models\Subdit;
use App\Models\Level;
use App\Models\Status;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Jabatan::create([
            'jabatan' => 'Analis Kebijakan Ahli Madya'
        ]);

        Jabatan::create([
            'jabatan' => 'Kasubdit Wilayah I'
        ]);

        Jabatan::create([
            'jabatan' => 'Kasubdit Wilayah II'
        ]);

        Jabatan::create([
            'jabatan' => 'Kasubdit Wilayah III'
        ]);

        Jabatan::create([
            'jabatan' => 'Analis Kebijakan Ahli Muda'
        ]);

        Jabatan::create([
            'jabatan' => 'Jabatan Fungsional Tertentu Pratama'
        ]);

        Jabatan::create([
            'jabatan' => 'Tenaga Administrasi Pengelola Monitoring dan Evaluasi'
        ]);

        Jabatan::create([
            'jabatan' => 'Tenaga Administrasi Analis Data dan Informasi'
        ]);

        Jabatan::create([
            'jabatan' => 'Tenaga Administrasi Penata Keuangan'
        ]);

        Jabatan::create([
            'jabatan' => 'Tenaga Administrasi Pengadministrasian Umum'
        ]);

        Jabatan::create([
            'jabatan' => 'Tenaga Administrasi Pengelola Data'
        ]);

        Jabatan::create([
            'jabatan' => 'Lainnya'
        ]);

        Unit::create([
            'unit' => 'Sekretariat'
        ]);

        Unit::create([
            'unit' => 'Direktorat PAPD'
        ]);

        Unit::create([
            'unit' => 'Direktorat FPKAD'
        ]);

        Unit::create([
            'unit' => 'Direktorat PKAD'
        ]);

        Unit::create([
            'unit' => 'Direktorat KKD'
        ]);

        Unit::create([
            'unit' => 'Direktorat EPD'
        ]);

        Subdit::create([
            'subdit' => 'Subdit Standar dan Pedoman Evaluasi'
        ]);

        Subdit::create([
            'subdit' => 'Subdit 2 Wilayah I'
        ]);

        Subdit::create([
            'subdit' => 'Subdit 3 Wilayah II'
        ]);

        Subdit::create([
            'subdit' => 'Subdit 4 Wilayah III'
        ]);

        Subdit::create([
            'subdit' => 'Subdit 5 Wilayah IV'
        ]);

        Subdit::create([
            'subdit' => 'Tata Usaha'
        ]);

        Subdit::create([
            'subdit' => 'Bagian Umum'
        ]);

        Level::create([
            'level' => 'System Administrator'
        ]);

        Level::create([
            'level' => 'Approver'
        ]);

        Level::create([
            'level' => 'Employee'
        ]);

        Status::create([
            'status' => 'Belum Disetujui'
        ]);

        Status::create([
            'status' => 'Disetujui'
        ]);

        Status::create([
            'status' => 'Ditolak'
        ]);

        User::create([
            'username' => 'admin',
            'name' => 'Admin Dit EPD',
            'email' => 'fileditepd@gmail.com',
            'password' => Hash::make('12345678'),
            'id_sub' => 1,
            'id_jab' => 1,
            'id_unit' => 1,
            'id_level' => 1
        ]);

        User::create([
            'username' => 'user',
            'name' => 'User Dit EPD',
            'email' => 'file@gmail.com',
            'password' => Hash::make('12345678'),
            'id_sub' => 2,
            'id_jab' => 2,
            'id_unit' => 2,
            'id_level' => 2
        ]);
    }
}
