<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEggCollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egg_collections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned();
            $table->integer('number_of_eggs');
            $table->double('weight');
            $table->integer('broken_eggs')->nullable();
            $table->integer('soft_shelled_eggs')->nullable();
            $table->date('date_collected');
            $table->string('remarks')->nullable();
            $table->date('date_deleted')->nullable();
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
        Schema::dropIfExists('egg_collections');
    }
}
