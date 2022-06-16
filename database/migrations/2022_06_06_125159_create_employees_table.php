<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('matricule',250)->nullable(false);
            $table->string('first_name',250)->nullable(false);
            $table->string('last_name',250)->nullable(false);
            $table->date('birth_date')->nullable(false);
            $table->smallInteger('gender')->nullable(false);
            $table->string('address',250)->nullable(false);
            $table->string('password',250)->nullable(false);
            $table->string('phone_perso',250)->nullable(false);
            $table->string('phone_pro',250)->nullable();
            $table->string('email_perso',250)->nullable();
            $table->string('email_pro',250)->nullable(false);
            $table->string('num_cnss',250)->nullable();
            $table->string('num_policy',250)->nullable();
            $table->string('photo',250)->nullable();
            $table->bigInteger('nationality_id')->unsigned()->nullable(false);
            $table->bigInteger('contract_id')->unsigned()->nullable(false);

            //$table->string('remember_token',250)->nullable();
            //$table->string('password_forget_token', 250)->nullable();

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
        Schema::dropIfExists('employees');
    }
};
