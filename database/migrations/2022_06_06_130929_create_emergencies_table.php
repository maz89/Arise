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
        Schema::create('emergencies', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 100)->nullable(false);
            $table->string('last_name', 100)->nullable(false);
            $table->smallInteger('relationship')->nullable(false);
            $table->string('telephone', 250)->nullable(false);
            $table->string('address', 250)->nullable(false);
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
        Schema::dropIfExists('emergencies');
    }
};
