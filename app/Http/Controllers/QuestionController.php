<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel;
use App\Models\AnswerModel;
use \Carbon\Carbon;
// model custom

// model eloquent
use App\Question;
use App\Answer;
use App\Category;
use App\Tag;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $questions = Question::all();

        return view('question.index', compact('questions'));
    }

    public function create(){
        $categories = Category::all();
        return view('question.form', compact('categories'));
    }

    public function store(Request $request){
        // dd($request->all());
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        // create question baru
        $new_question = new Question;
        $new_question->judul = $request->judul;
        $new_question->isi = $request->isi;
        $new_question->user_id = $request->user()->id;
        $new_question->created_at = $mytime;
        $new_question->updated_at = $mytime;
        $new_question->category_id = $request->category_id;

        $new_question->save();

        // dd($request->tags);

        $tagArr = explode(',', $request->tags);
        // dd($tagArr);
        $tagsMulti = [];
        foreach($tagArr as $strTag){
            $tagArrAssc["tag_name"] = $strTag;
            $tagsMulti[] = $tagArrAssc;
        }
        // dd($tagsMulti);
        // create Tags baru
        foreach($tagsMulti as $tagChek){
            $tag = Tag::firstOrCreate($tagChek);
            $new_question->tags()->attach($tag->id);
        }

        return redirect('/question');
    }

    public function show($id){
        $question = Question::where('id',$id)->first();
        $answers = Answer::where('question_id',$id)->get();
        return view('question.show', compact('question', 'answers'));
    }

    public function edit($id){
        // dd('masuk');
        $question = Question::find($id);
        $categories = Category::all();
        return view('question.edit', compact('question', 'categories'));
    }

    public function update($id, Request $request){
        $mytime = Carbon::now();
        $mytime->toDateTimeString();

        $question = Question::find($id);
        $question->judul = $request->judul;
        $question->isi = $request->isi;
        $question->updated_at = $mytime;
        $question->created_at = $request->created_at;
        $question->category_id = $request->category_id;
        $question->save();
        return redirect('/question');
    }

    public function destroy($id,$question_id){
        dd($id);
        $question = Question::find($id);
        $question->delete();
        return redirect('/question');
    }

}
