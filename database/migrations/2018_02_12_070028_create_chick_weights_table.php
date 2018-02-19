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
            $table->integer('male_qty');
            $table->double('male_wt');
            $table->integer('female_qty');
            $table->double('female_wt');
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
