<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            $table->string('name_company', 100)->nullable(false);
            $table->string('position', 100)->nullable(false);
            $table->string('address', 250)->nullable(true);
            $table->date('date_start')->nullable(true);
            $table->string('date_end')->nullable(true);
            $table->bigInteger('employee_id')->unsigned()->nullable(false);
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
        Schema::dropIfExists('experiences');
    }
}
