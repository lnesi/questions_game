<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OpeningScreens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("opening_screens",function(Blueprint $table){
            $table->increments('id');
            $table->integer("game_set_id")->unsigned();
            $table->string("title");
            $table->longText("main_copy");
            $table->timestamps();
            $table->foreign("game_set_id")->references("id")->on("game_sets")->onDelete('cascade');
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
        Schema::drop("opening_screens");
    }
}
