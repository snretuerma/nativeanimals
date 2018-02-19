<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEggQualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('egg_qualities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned();
            $table->double('egg_weight');
            $table->string('egg_color');
            $table->string('egg_shape');
            $table->double('egg_length');
            $table->double('egg_width');
            $table->double('shell_weight');
            $table->double('thickness_top');
            $table->double('thickness_mid');
            $table->double('thickness_bot');
            $table->double('albumen_height');
            $table->string('yolk_color');
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
        Schema::dropIfExists('egg_qualities');
    }
}
