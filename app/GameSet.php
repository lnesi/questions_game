<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameSet extends Model
{
   
    
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at','created_at','updated_at'];
    protected $table="game_sets";
    protected $fillable=['lookup_name','pin'];
    protected $with=['opening_screen','questions'];

    public function questions(){
    	return $this->hasMany('App\Question');
    }

    public function opening_screen(){
    	return $this->hasOne('App\OpeningScreen');
    }
}
