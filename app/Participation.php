<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    //
    protected $table="participations";
    protected $dates = ['updated_at','created_at'];
}
