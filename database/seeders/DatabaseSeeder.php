<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call([

            ContinentTableSeeder::class,

            BandTableSeeder::class,

            DiseaseTableSeeder::class,

            RegionTableSeeder::class,

            CountrieTableSeeder::class,

            CoutumeTableSeeder::class,

            FormerEmployerTableSeeder::class,

            NiveauTableSeeder::class,

            CategorieTableSeeder::class,
            ApartmentTableSeeder::class,
             AssignmentTableSeeder::class,
          BankInfoTableSeeder::class,
          BandTableSeeder::class,
          BrandTableSeeder::class,
            BusinessTableSeeder::class,
            CompanyTableSeeder::class,
            ContractTableSeeder::class,
            ContractTypeTableSeeder::class,
            DepartmentTableSeeder::class,
            DriverTableSeeder::class,
            DriveTableSeeder::class,
            EmergencieTableSeeder::class,
            EmployeTableSeeder::class,
            ExperienceTableSeeder::class,
            FamilyTableSeeder::class,
            ImmunizationTableSeeder::class,
            ModeleTableSeeder::class,
            NationaliteTableSeeder::class,
            PositionTableSeeder::class,
            ProfilTableSeeder::class,
            RoleTableSeeder::class,
            VaccineTableSeeder::class,

             VehicleTableSeeder::class,






        ]);



    }
}
