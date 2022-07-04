<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            $table->string('color', 250)->nullable(true);
            $table->string('plate', 250)->nullable(true);
            $table->string('photo', 250)->nullable(true);
            $table->string('vehicle_type', 250)->nullable(true);
            $table->bigInteger('brand_id')->nullable(true);
            $table->bigInteger('modele_id')->nullable(true);
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
        Schema::dropIfExists('vehicles');
    }
}
