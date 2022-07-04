<?php

namespace Database\Seeders;

use App\Models\Employe;
use Database\Factories\EmployeFactory;
use Illuminate\Database\Seeder;

class EmployeTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employe::factory()
            ->count(4)
            ->create();
    }
}


