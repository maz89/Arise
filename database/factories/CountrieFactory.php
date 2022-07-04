<?php

namespace Database\Factories;





use App\Models\Countrie;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CountrieFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Countrie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'libelle' => $this->faker->name,
            'nationality' => $this->faker->name,

            'region_id' => function () {
                return Region::factory()->create()->id;
            },

        ];
    }


}
