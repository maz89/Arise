<?php

namespace Database\Seeders;

use App\Models\Immunization;
use Illuminate\Database\Seeder;

class ImmunizationTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Immunization::factory()
            ->count(4)
            ->create();
    }
}


