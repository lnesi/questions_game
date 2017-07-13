<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Question;
class Answer extends Model
{
    //
    protected $table="answers";
    protected $dates = ['updated_at','created_at'];
    protected $fillable=['question_id','text','explenation','is_correct'];

    public function question(){
    	return $this->belongsTo(Question::class,'question_id');
    }

     public function getIsCorrectAttribute($value){
     	return $value==1;
     }
}
