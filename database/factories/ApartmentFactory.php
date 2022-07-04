<?php

namespace Database\Factories;




use App\Models\Apartment;


use App\Models\Building;
use App\Models\Employe;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApartmentFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Apartment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'nb_rooms' => $this->faker->numberBetween(1, 20),
            'num_apartment' => $this->faker->numberBetween(1, 10),

            'building_id' => function () {
                return Building::factory()->create()->id;
            },




        ];
    }


}
