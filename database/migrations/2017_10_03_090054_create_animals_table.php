<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animaltype_id')->unsigned();
            $table->string('registryid')->nullable();
            $table->integer('farm_id')->unsigned();
            $table->integer('breed_id')->unsigned();
            $table->boolean('phenotypic')->default(false);
            $table->boolean('morphometric')->default(false);
            $table->integer('growth')->default(0);
            $table->string('status');
            $table->integer('pen_id')->unsigned();
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
        Schema::dropIfExists('animals');
    }
}
