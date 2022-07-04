<?php

namespace Database\Factories;




use App\Models\Assignment;


use App\Models\Business;
use App\Models\Departement;
use App\Models\Employe;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssignmentFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Assignment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'date_start' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'date_end' => $this->faker->dateTimeBetween('-2 years', '-1 years'),

            'position_id' => function () {
                return Position::factory()->create()->id;
            },




            'department_id' => function () {
                return Departement::factory()->create()->id;
            },


            'business_id' => function () {
                return Business::factory()->create()->id;
            },

            'is_manager' => $this->faker->numberBetween(1, 2),
            'is_encours' => $this->faker->numberBetween(1, 2),





        ];
    }


}
