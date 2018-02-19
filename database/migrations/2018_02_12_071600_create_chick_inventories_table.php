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
            $table->integer('male_qty');
            $table->integer('female_qty');
            $table->integer('total');
            $table->string('activity');
            $table->date('date');
            $table->string('remarks');
            $table->integer('animal_id')->unsigned();
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
