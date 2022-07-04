<?php

namespace Database\Factories;




use App\Models\Company;
use App\Models\Contract;
use App\Models\Drive;

use App\Models\Driver;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DriveFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Drive::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'date_debut' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'date_fin' => $this->faker->dateTimeBetween('-2 years', '-1 years'),

            'driver_id' => function () {
                return Driver::factory()->create()->id;
            },


            'vehicle_id' => function () {
                return Vehicle::factory()->create()->id;
            },

        ];
    }


}
