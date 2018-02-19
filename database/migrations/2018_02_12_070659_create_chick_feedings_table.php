<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChickFeedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chick_feedings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chick_id')->unsigned();
            $table->double('feed_offered');
            $table->double('feed_refused');
            $table->string('feed_type');
            $table->date('date_fed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chick_feedings');
    }
}
