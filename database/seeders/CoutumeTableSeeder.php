<?php

namespace Database\Seeders;

use App\Models\Coutume;
use Illuminate\Database\Seeder;

class CoutumeTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coutume::factory()
            ->count(4)
            ->create();
    }
}


