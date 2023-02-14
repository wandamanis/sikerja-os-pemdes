<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $level = [
            ['level' => 'System Administrator'],
            ['level' => 'Approver'],
            ['level' => 'Employee'],
        ];

        Level::insert($level);
    }
}
