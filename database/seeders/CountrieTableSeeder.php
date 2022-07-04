<?php

namespace Database\Seeders;

use App\Models\Countrie;
use Illuminate\Database\Seeder;

class CountrieTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Countrie::factory()
            ->count(4)
            ->create();
    }
}


