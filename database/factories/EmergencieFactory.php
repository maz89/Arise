<?php

namespace Database\Factories;




use App\Models\Emergencie;


use App\Models\Employe;
use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmergencieFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Emergencie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,

            'relationship' => $this->faker->numberBetween(1, 2),
            'telephone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,

            'employee_id' => function () {
                return Employe::factory()->create()->id;
            },





        ];
    }


}
