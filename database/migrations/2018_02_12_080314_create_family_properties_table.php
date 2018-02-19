<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamilyPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('family_id')->unsigned();
            $table->integer('property_id')->unsigned();
            $table->string('value');
            $table->date('date_added');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('family_properties');
    }
}
