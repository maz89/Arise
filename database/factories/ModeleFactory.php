<?php

namespace Database\Factories;




use App\Models\Brand;
use App\Models\Modele;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModeleFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Modele::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'modele' => $this->faker->name,

            'brand_id' => function () {
                return Brand::factory()->create()->id;
            },

        ];
    }


}
