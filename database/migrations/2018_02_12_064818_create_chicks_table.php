<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chicks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned();
            $table->date('date_eggs_set');
            $table->integer('number_eggs_set');
            $table->integer('week_of_lay')->nullable();
            $table->integer('fertile_eggs')->nullable();
            $table->date('date_hatched')->nullable();
            $table->integer('hatched_eggs')->nullable();
            $table->integer('current_pen_id')->unsigned()->nullable();
            $table->string('hatchery_record')->default('00');
            $table->string('remarks')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chicks');
    }
}
