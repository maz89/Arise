<?php

namespace Database\Seeders;

use App\Models\Nationalite;
use Illuminate\Database\Seeder;

class NationaliteTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationalite::factory()
            ->count(4)
            ->create();
    }
}


