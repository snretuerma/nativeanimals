<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChickWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chick_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chick_id')->unsigned();
            $table->integer('male_qty')->nullable();
            $table->double('male_wt')->nullable();
            $table->integer('female_qty')->nullable();
            $table->double('female_wt')->nullable();
            $table->integer('total');
            $table->double('total_wt');
            $table->date('date_collected');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chick_weights');
    }
}
