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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',250)->nullable();
            $table->string('last_name',250)->nullable();
            $table->string('birth_date',250)->nullable();
            $table->string('email',250)->nullable();
            $table->string('telephone',250)->nullable();
            $table->bigInteger('company_id')->nullable();
            $table->string('photo', 250)->nullable();
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
};
