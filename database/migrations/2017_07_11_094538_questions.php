<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create("questions",function(Blueprint $table){
            $table->increments("id");
            $table->integer("game_set_id")->unsigned();
            $table->text("text");
            $table->integer("value")->unsigned()->default(100);
            $table->boolean('active')->default(false);
            $table->timestamps();
            $table->foreign("game_set_id")->references("id")->on("game_sets")->onDelete("cascade");
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
        Schema::drop("questions");
    }
}
