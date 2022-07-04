<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoutumesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coutumes', function (Blueprint $table) {
            $table->id();

            $table->string('libelle');
            $table->bigInteger('prefecture_id')->unsigned()->nullable(false);

            $table->bigInteger('countrie_id')->unsigned()->nullable(true);
            $table->bigInteger('region_id')->unsigned()->nullable(true);
            $table->bigInteger('continent_id')->unsigned()->nullable(true);

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
        Schema::dropIfExists('coutumes');
    }
}
