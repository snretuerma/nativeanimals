<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChickInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chick_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chick_id')->unsigned();
            $table->integer('days')->unsigned();
            $table->integer('male_qty')->nullable();
            $table->integer('female_qty')->nullable();
            $table->integer('total');
            $table->string('activity');
            $table->dateTime('date');
            $table->string('remarks')->nullable();
            $table->integer('family_id')->unsigned();
            $table->date('date_died')->nullable();
            $table->date('date_sold')->nullable();
            $table->date('date_added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chick_inventories');
    }
}
