<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateFarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('auth_code')->unique();
            $table->string('farm_id');
            $table->string('farm_type');
            $table->string('region')->nullable();
            $table->string('province')->nullable();
            $table->string('town')->nullable();
            $table->string('barangay')->nullable();
            $table->string('tel_no')->nullable();
            $table->string('mobile_no');
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
        Schema::dropIfExists('farms');
    }
}
