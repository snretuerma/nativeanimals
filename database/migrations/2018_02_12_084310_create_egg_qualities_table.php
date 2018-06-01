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
            $table->integer('egg_quality_at')->unsigned();
            $table->string('sample_no')->nullable();
            $table->integer('generation')->unsigned();
            $table->integer('line')->unsigned();
            $table->integer('family')->unsigned();
            $table->double('egg_weight');
            $table->string('egg_color');
            $table->string('egg_shape');
            $table->double('egg_length');
            $table->double('egg_width');
            $table->double('albumen_height');
            $table->double('albumen_weight');
            $table->double('yolk_weight');
            $table->string('yolk_color');
            $table->double('shell_weight');
            $table->double('thickness_top');
            $table->double('thickness_mid');
            $table->double('thickness_bot');
            $table->date('date_collected');
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
        Schema::dropIfExists('egg_qualities');
    }
}
