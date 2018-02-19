<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeightCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weight_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('animal_id')->unsigned();
            $table->integer('weight_at')->unsigned();
            $table->double('weight');
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
        Schema::dropIfExists('weight_collections');
    }
}
