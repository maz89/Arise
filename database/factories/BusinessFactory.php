<?php

namespace Database\Factories;




use App\Models\Business;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BusinessFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Business::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'code' => $this->faker->word,
            'title' => $this->faker->sentence,



        ];
    }


}
