<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    //
    protected $table="participants";
    protected $dates = ['updated_at','created_at'];

    public function participations(){
    	$this->hasMany("App\Participation");
    }
}
