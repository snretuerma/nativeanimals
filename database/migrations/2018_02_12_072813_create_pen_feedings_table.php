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
            $table->integer('family_id')->unsigned();
            $table->integer('pen_id')->unsigned();
            $table->string('feed_offered');
            $table->string('feed_refused');
            $table->string('type_offered')->nullable();
            $table->date('date_fed');
            $table->double('amount_offered');
            $table->double('amount_refused');
            $table->string('remarks')->nullable();
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
