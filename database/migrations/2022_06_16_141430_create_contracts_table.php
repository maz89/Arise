<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();

            $table->date('date_start')->nullable(false);
            $table->date('date_end')->nullable(false);

            $table->smallInteger('status_contract')->nullable(true);
            $table->date('date_interruption')->nullable(true);
            $table->text('motif_interruption')->nullable(true);

            $table->bigInteger('contract_type_id')->unsigned()->nullable(false);
            $table->bigInteger('employe_id')->unsigned()->nullable(false);
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
        Schema::dropIfExists('contracts');
    }
}
