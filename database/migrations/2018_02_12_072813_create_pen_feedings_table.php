<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenFeedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pen_feedings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pen_id')->unsigned();
            $table->double('feed_offered');
            $table->double('feed_refused');
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
        Schema::dropIfExists('pen_feedings');
    }
}
