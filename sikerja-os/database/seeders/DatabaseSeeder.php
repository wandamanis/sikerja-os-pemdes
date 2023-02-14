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
        
        $this->call(UserSeeder::class);
        $this->call(JabatanSeeder::class);
        $this->call(KinerjaSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(SubditSeeder::class);
        $this->call(UnitSeeder::class);

        $this->command->info('All data table seeded!');
    }
}
