<?php

namespace Database\Factories;




use App\Models\Brand;
use App\Models\Niveau;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NiveauFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Niveau::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'libelle' => $this->faker->name,



        ];
    }


}
