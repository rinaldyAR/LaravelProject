<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
