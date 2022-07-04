<?php

namespace Database\Factories;




use App\Models\ContractType;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContractTypeFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = ContractType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->word,

        ];
    }


}
