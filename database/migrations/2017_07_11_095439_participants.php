<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Participants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("participants",function(Blueprint $table){
            $table->increments('id');
            $table->integer("game_set_id")->unsigned();
            $table->string("email");
            $table->string('name');
            $table->string("company")->nullable();
            $table->string("position")->nullable();
            $table->timestamps();
            $table->foreign('game_set_id')->references("id")->on("game_sets")->onDelete("cascade");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop("participants");
    }
}
