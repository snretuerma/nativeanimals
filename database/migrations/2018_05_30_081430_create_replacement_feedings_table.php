<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplacementFeedingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacement_feedings', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('pen_id')->unsigned();
          $table->string('feed_offered')->nullable();
          $table->string('feed_refused')->nullable();
          $table->date('date_fed');
          $table->double('amount_offered');
          $table->double('amount_refused');
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
        Schema::dropIfExists('replacement_feedings');
    }
}
