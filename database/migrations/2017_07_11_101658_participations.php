<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Participations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("participations",function(Blueprint $table){
            $table->increments('id');
            $table->integer("participant_id")->unsigned();
            $table->integer("game_set_id")->unsigned();
            $table->integer("score");
            $table->float("time",10,2)->default(0);
            $table->timestamps();
            $table->foreign("participant_id")->references("id")->on("participants")->onDelete("cascade");
            $table->foreign("game_set_id")->references('id')->on("game_sets")->onDelete("cascade");
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
        Schema::drop("participations");
    }
}
