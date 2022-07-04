<?php

namespace Database\Factories;




use App\Models\Countrie;
use App\Models\Prefecture;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PrefectureFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Prefecture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'libelle' => $this->faker->name,

            'countrie_id' => function () {
                return Countrie::factory()->create()->id;
            },

        ];
    }


}
