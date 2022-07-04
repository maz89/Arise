<?php

namespace Database\Seeders;

use App\Models\Emergencie;
use Illuminate\Database\Seeder;

class EmergencieTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Emergencie::factory()
            ->count(4)
            ->create();
    }
}


