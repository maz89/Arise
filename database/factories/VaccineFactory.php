<?php

namespace Database\Factories;




use App\Models\Disease;
use App\Models\Vaccine;


use App\Models\VaccineType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VaccineFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Vaccine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' => $this->faker->name,

            'nb_doses' => $this->faker->numberBetween(1, 3),

            'disease_id' => function () {
                return Disease::factory()->create()->id;
            },



        ];
    }


}
