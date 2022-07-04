<?php

namespace Database\Factories;




use App\Models\Employe;
use App\Models\Profil;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfilFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Profil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->firstName,

            'employee_id' => function () {
                return Employe::factory()->create()->id;
            },



        ];
    }


}
