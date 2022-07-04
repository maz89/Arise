<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id();

            $table->date('date_start')->nullable(true);
            $table->date('date_end')->nullable(true);
            $table->bigInteger('position_id')->nullable(true);
            $table->bigInteger('employee_id')->nullable(true);
            $table->bigInteger('department_id')->nullable(true);
            $table->smallInteger('is_manager')->nullable(true);
            $table->smallInteger('is_encours')->nullable(true);
            $table->bigInteger('business_id')->nullable(true);
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
        Schema::dropIfExists('assignments');
    }
}
