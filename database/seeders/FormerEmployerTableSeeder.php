<?php

namespace Database\Seeders;

use App\Models\FormerEmployer;
use Illuminate\Database\Seeder;

class FormerEmployerTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormerEmployer::factory()
            ->count(4)
            ->create();
    }
}


