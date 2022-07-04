<?php

namespace Database\Factories;




use App\Models\Contract;


use App\Models\ContractType;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContractFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Contract::class;

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
            'date_start_probation' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'date_end_probation' => $this->faker->dateTimeBetween('-2 years', '-1 years'),

            'status_contract' => $this->faker->numberBetween(1, 2),

            'contract_type_id' => function () {
                return ContractType::factory()->create()->id;
            },

            'employe_id' => function () {
                return Employe::factory()->create()->id;
            },




        ];
    }


}
