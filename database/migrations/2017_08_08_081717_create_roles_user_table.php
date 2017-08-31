<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD
         Schema::create('role_user', function (Blueprint $table) {
=======
        Schema::create('role_user', function(Blueprint $table){
>>>>>>> upstream/master
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD
        Schema::dropIfExists('role_user');
=======
        //
>>>>>>> upstream/master
    }
}
