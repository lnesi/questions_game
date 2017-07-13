<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameSetTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared("CREATE TRIGGER after_insert_game_set AFTER INSERT ON game_sets FOR EACH ROW 
                        BEGIN
                            INSERT INTO opening_screens(game_set_id,title,main_copy,created_at,updated_at) VALUES(NEW.id,'Default Screen','Main Copy',now(),now());
                        END");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        DB::unprepared('DROP TRIGGER `after_insert_game_set`');
    }
}
