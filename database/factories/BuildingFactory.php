<?php

namespace Database\Factories;




use App\Models\Building;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BuildingFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Building::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'address' => $this->faker->address,
            'name' => $this->faker->name,
            'photo' => $this->faker->sentence,
            'name_manager' => $this->faker->name,
            'email_manager' => $this->faker->email,
            'telephone_manager' => $this->faker->phoneNumber,



        ];
    }


}
