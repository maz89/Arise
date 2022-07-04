<?php

namespace Database\Factories;




use App\Models\Band;
use App\Models\Categorie;
use App\Models\Continent;
use App\Models\Contract;
use App\Models\Countrie;
use App\Models\Coutume;
use App\Models\Employe;


use App\Models\FormerEmployer;

use App\Models\Prefecture;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployeFactory extends Factory
{
    /**
     * Factory de la table Appreciation scolaires .
     *
     * @var string
     */
    protected $model = Employe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'matricule' => '00000',
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'usual_name' => $this->faker->lastName,
            'emergency_contact' => $this->faker->phoneNumber,

            'birth_date' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'birth_date_correct' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'date_debut' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'date_fin' => $this->faker->dateTimeBetween('-2 years', '-1 years'),
            'gender' => $this->faker->numberBetween(1, 2),
            'type' => $this->faker->numberBetween(1, 2),
            'is_contrat' => $this->faker->numberBetween(1, 2),
            'address' => $this->faker->address,
            'password' => $this->faker->password,
            'phone_perso' => $this->faker->phoneNumber,
            'phone_pro' => $this->faker->phoneNumber,
            'email_perso' => $this->faker->email,
            'email_pro' => $this->faker->companyEmail,
            'num_cnss' => '00000',

            'num_policy' => '00000',
            'civile' => $this->faker->numberBetween(1, 2),

            'photo' => $this->faker->sentence,

            'categorie_id' => function () {
                return Categorie::factory()->create()->id;
            },

            'contract_id' => function () {
                return Contract::factory()->create()->id;
            },

            'former_employer_id' => function () {
                return FormerEmployer::factory()->create()->id;
            },



            'continent_id' => function () {
                return Continent::factory()->create()->id;
            },


            'region_id' => function () {
                return Region::factory()->create()->id;
            },

            'countrie_id' => function () {
                return Countrie::factory()->create()->id;
            },

            'prefecture_id' => function () {
                return Prefecture::factory()->create()->id;
            },


            'coutume_id' => function () {
                return Coutume::factory()->create()->id;
            },


            'band_id' => function () {
                return Band::factory()->create()->id;
            },







        ];
    }


}
