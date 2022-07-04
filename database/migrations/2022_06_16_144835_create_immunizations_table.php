<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmunizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immunizations', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('employee_id')->unsigned()->nullable(true);
            $table->bigInteger('vaccine_id')->unsigned()->nullable(true);
            $table->date('date_immunization')->nullable(true);
            $table->smallInteger('is_vaccine')->nullable(true);
            $table->text('reason')->nullable(true);
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
        Schema::dropIfExists('immunizations');
    }
}
