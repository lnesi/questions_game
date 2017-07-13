<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table="questions";
    protected $dates = ['updated_at','created_at'];
    protected $fillable=['text','value','game_set_id'];
    protected $with=['answers'];
    
    public function answers(){
    	return $this->hasMany('App\Answer');
    }
}
