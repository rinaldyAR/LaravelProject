<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;

class AnswerController extends Controller
{
    public function index($question_id){
        $answers = AnswerModel::find_by_question_id($question_id);
        return view('question.form', compact('answers'));
    }
}
