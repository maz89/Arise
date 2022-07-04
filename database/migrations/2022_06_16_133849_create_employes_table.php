<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->id();

            $table->string('matricule',250)->nullable(true);
            $table->string('first_name',250)->nullable(true);
            $table->string('last_name',250)->nullable(true);
            $table->string('usual_name',250)->nullable(true);
            $table->string('emergency_contact',250)->nullable(true);
            $table->date('birth_date')->nullable(true);
            $table->date('birth_date_correct')->nullable(false);
            $table->date('date_debut')->nullable(true);
            $table->date('date_fin')->nullable(true);
            $table->smallInteger('gender')->nullable(true);
            $table->smallInteger('type')->nullable(true);
            $table->smallInteger('is_contrat')->nullable(true);
            $table->string('address',250)->nullable(true);
            $table->string('password',250)->nullable(true);
            $table->string('phone_perso',250)->nullable(true);
            $table->string('phone_pro',250)->nullable(false);
            $table->string('email_perso',250)->nullable(true);
            $table->string('email_pro',250)->nullable(true);
            $table->string('num_cnss',250)->nullable(true);
            $table->string('num_policy',250)->nullable(true);
            $table->smallInteger('civile')->nullable(true);
            $table->string('photo',250)->nullable(true);
            $table->bigInteger('contract_id')->nullable(true);
            $table->bigInteger('categorie_id')->nullable(true);
            $table->bigInteger('former_employer_id')->nullable(true);
            $table->bigInteger('continent_id')->nullable(true);
            $table->bigInteger('region_id')->nullable(true);
            $table->bigInteger('countrie_id')->nullable(true);
            $table->bigInteger('prefecture_id')->nullable(true);
            $table->bigInteger('coutume_id')->nullable(true);
            $table->bigInteger('band_id')->nullable(true);
            $table->bigInteger('niveau_id')->nullable(true);
            $table->bigInteger('contract_type_id')->nullable(true);
            $table->bigInteger('departement_id')->nullable(true);
            $table->bigInteger('position_id')->nullable(true);


            $table->integer('status')->default(1);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
