<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel;
use App\Models\AnswerModel;

// model custom

// model eloquent
use App\Question;

class QuestionController extends Controller
{
    public function index(){
        $questions = Question::all();
        
        return view('question.index', compact('questions'));
    }

    public function create(){
        return view('question.form');
    }

    public function store(Request $request){
        $new_question = new question;
        $new_question->judul = $request->judul;
        $new_question->isi = $request->isi;
        $new_question->tanggal_dibuat = $request->tanggal_dibuat;
        $new_question->tanggal_diperbaharui = $request->tanggal_diperbaharui;

        $new_question->save();
        return redirect('/question');
    }

    public function show($id){
        $question = QuestionModel::find_by_id($id);
        $answers = AnswerModel::find_by_question_id($id);
        return view('question.show', compact('question', 'answers'));
    }

    public function edit($id){
        // dd('masuk');
        $question = QuestionModel::find_by_id($id);
        return view('question.edit', compact('question'));
    }

    public function update($id, Request $request){
        $question = QuestionModel::update($id, $request->all());
        return redirect('/question');
    }

    public function destroy($id){
        $deleted = QuestionModel::destroy($id);
        return redirect('/question');
    }

}
