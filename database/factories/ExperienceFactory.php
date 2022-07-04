<?php

namespace Database\Factories;




use App\Models\Employe;
use App\Models\Experience;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ExperienceFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name_company' => $this->faker->company,
            'position' => $this->faker->postcode,
            'address' => $this->faker->address,
            'date_start' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'date_end' => $this->faker->dateTimeBetween('-2 years', '-1 years'),

            'employee_id' => function () {
                return Employe::factory()->create()->id;
            },




        ];
    }


}
