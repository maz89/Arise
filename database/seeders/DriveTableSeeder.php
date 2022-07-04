<?php

namespace Database\Seeders;

use App\Models\Drive;
use Illuminate\Database\Seeder;

class DriveTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Drive::factory()
            ->count(4)
            ->create();
    }
}


