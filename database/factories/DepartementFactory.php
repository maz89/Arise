<?php

namespace Database\Factories;




use App\Models\Contract;
use App\Models\Departement;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartementFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Departement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => $this->faker->word,



        ];
    }


}
