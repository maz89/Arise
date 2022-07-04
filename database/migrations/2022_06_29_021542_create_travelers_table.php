<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travelers', function (Blueprint $table) {
            $table->id();

            $table->string('firstname')->nullable(true);
            $table->string('lastname')->nullable(true);
            $table->bigInteger('countrie_id')->nullable(true);
            $table->bigInteger('business_id')->nullable(true);
            //nature value: visitor-employee-investor-contractor
            $table->bigInteger('nature_id')->nullable(true);
            //motif du voyage
            $table->string('trip_purpose')->nullable(true);



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
        Schema::dropIfExists('travelers');
    }
}
