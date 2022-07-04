<?php

namespace Database\Factories;




use App\Models\Brand;
use App\Models\FormerEmployer;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FormerEmployerFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = FormerEmployer::class;

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
