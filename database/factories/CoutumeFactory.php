<?php

namespace Database\Factories;


use App\Models\Coutume;

use App\Models\Prefecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CoutumeFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Coutume::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'libelle' => $this->faker->name,

            'prefecture_id' => function () {
                return Prefecture::factory()->create()->id;
            },

        ];
    }


}
