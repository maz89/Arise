<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();

            $table->string('first_name',250)->nullable(true);
            $table->string('last_name',250)->nullable(true);
            $table->string('birth_date',250)->nullable(true);
            $table->string('email',250)->nullable(true);
            $table->string('telephone',250)->nullable(true);
            $table->bigInteger('company_id')->nullable(true);
            $table->string('photo', 250)->nullable(true);
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
        Schema::dropIfExists('drivers');
    }
}
