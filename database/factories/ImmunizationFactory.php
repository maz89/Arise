<?php

namespace Database\Factories;




use App\Models\Employe;
use App\Models\Immunization;

use App\Models\Vaccine;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ImmunizationFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Immunization::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'date_immunization' => $this->faker->dateTimeBetween('-2 years', '-1 years'),

            'employee_id' => function () {
                return Employe::factory()->create()->id;
            },

            'vaccine_id' => function () {
                return Vaccine::factory()->create()->id;
            },

            'is_vaccine' => $this->faker->numberBetween(1, 2),

            'reason' => $this->faker->text,



        ];
    }


}
