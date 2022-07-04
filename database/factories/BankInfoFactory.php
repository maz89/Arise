<?php

namespace Database\Factories;


use App\Models\BankInfo;


use App\Models\Employe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BankInfoFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = BankInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'bank_code' => $this->faker->bankAccountNumber,
            'agency_code' => $this->faker->companySuffix,
            'num_account' => $this->faker->creditCardNumber,
            'rib' => $this->faker->creditCardNumber,

            'employee_id' => function () {
                return Employe::factory()->create()->id;
            },


        ];
    }


}
