<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameSet;

class GameController extends ActivationAjaxController
{
    //
    protected $modelClass=GameSet::class;

    public function validatePin(Request $request){
    	$query=GameSet::where('pin',$request->input('value'));
    	$game=$query->get();
    	if($game->count()>0) return response('Already Exist',404);
    }

}
