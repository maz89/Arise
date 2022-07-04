<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->id();

            $table->string('address', 250)->nullable(true);
            $table->string('name', 250)->nullable(true);
            $table->string('photo', 250)->nullable(true);
            $table->string('name_manager', 250)->nullable(true);
            $table->string('email_manager', 250)->nullable(true);
            $table->string('telephone_manager', 250)->nullable(true);
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
        Schema::dropIfExists('buildings');
    }
}
