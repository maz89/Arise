<?php

namespace Database\Factories;




use App\Models\Company;
use App\Models\Contract;
use App\Models\Driver;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DriverFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Driver::class;

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
            'email' => $this->faker->email,
            'telephone' => $this->faker->phoneNumber,
            'photo' => $this->faker->sentence,
            'birth_date' => $this->faker->dateTimeBetween('-2 years', '-1 years'),

            'company_id' => function () {
                return Company::factory()->create()->id;
            },

        ];
    }


}
