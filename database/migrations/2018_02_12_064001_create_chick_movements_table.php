<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChickMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chick_movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chick_id')->unsigned();
            $table->integer('pen_id')->unsigned();
            $table->date('date_moved');
            $table->string('remarks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chick_movements');
    }
}
