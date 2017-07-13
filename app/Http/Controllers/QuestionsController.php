<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Question;
use \App\Answer;
class QuestionsController extends ActivationAjaxController
{
    //
    protected $modelClass=\App\Question::class;

    public function store(Request $request){
    	$question=Question::create($request->input());
    	$question->save();
    	foreach($request->input('answers') as $a){
    		$answer=Answer::create(["question_id"=>$question->id,"text"=>$a['text'],"explenation"=>$a['explenation'],"is_correct"=>$a["is_correct"]]);
    		$answer->save();
    	}
    	$question->answers;
    	return $question;
    }

    public function update(Request $request, $id){
        $question=Question::findOrFail($id);
        $question->fill($request->input());
        $question->save();
        foreach($request->input('answers') as $a){
            $answer=Answer::findOrFail($a['id']);
            $answer->fill($a);
            $answer->save();
        }
        return $question;
    }
}
