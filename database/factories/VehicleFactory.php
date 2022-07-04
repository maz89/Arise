<?php

namespace Database\Factories;




use App\Models\Brand;
use App\Models\Modele;
use App\Models\Vehicle;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VehicleFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Vehicle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'color' => $this->faker->name,
            'plate' => $this->faker->name,
            'photo' => $this->faker->sentence,
            'vehicle_type' => $this->faker->word,


            'brand_id' => function () {
                return Brand::factory()->create()->id;
            },

            'modele_id' => function () {
                return Modele::factory()->create()->id;
            },



        ];
    }


}
