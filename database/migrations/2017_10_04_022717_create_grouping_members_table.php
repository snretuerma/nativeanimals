<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupingMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grouping_members', function (Blueprint $table) {  
            $table->increments('id');
            $table->integer('grouping_id')->unsigned();
            $table->integer('animal_id')->unsigned();
            $table->smallInteger('isactive')->default(1);
            $table->date('datestart');
            $table->date('dateend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grouping_members');
    }
}
