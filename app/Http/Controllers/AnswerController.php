<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;
use App\Models\QuestionModel;

class AnswerController extends Controller
{
    public function index($question_id){
        // dd('masuk');
        $answers = AnswerModel::find_by_question_id($question_id);
        $question = QuestionModel::find_by_id($question_id);
        // dd($answers);
        return view('answer.form', compact('answers', 'question'));
    }

    public function store($question_id, Request $request){
        // dd('test');
        dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        AnswerModel::save($data);
        return redirect('/question');
    }
}
