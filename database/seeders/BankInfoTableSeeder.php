<?php

namespace Database\Seeders;

use App\Models\BankInfo;
use Illuminate\Database\Seeder;

class BankInfoTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BankInfo::factory()
            ->count(4)
            ->create();
    }
}


