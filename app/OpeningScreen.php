<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OpeningScreen extends Model
{
    //
    protected $table="opening_screens";
    protected $dates = ['updated_at','created_at'];
    protected $fillable=['main_copy','title'];
}

