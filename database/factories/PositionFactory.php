<?php

namespace Database\Factories;




use App\Models\Business;
use App\Models\Departement;
use App\Models\Employe;
use App\Models\Position;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PositionFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Position::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'job_title' => $this->faker->jobTitle,
            'job_french' => $this->faker->word,


        ];
    }


}
