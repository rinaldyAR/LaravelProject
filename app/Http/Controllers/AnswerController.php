<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;
use App\Models\QuestionModel;
use App\Question;
use App\Answer;
use \Carbon\Carbon;

class AnswerController extends Controller
{
    public function index($question_id){
        // dd('masuk');
        $answers = AnswerModel::find_by_question_id($question_id);
        
        $question=Question::where('id',$question_id)->first();

        // dd($question_id);

        // dd($answers);
        return view('answer.form', compact('answers', 'question'));
    }

    public function store($question_id, Request $request){
        $data = $request->all();
        // dd($question_id);
        unset($data["_token"]);
        AnswerModel::save($data);
        return redirect()->route('answer',[$question_id])->with('create_answer','commentar telah di buat');
    }

    public function edit($id,$question_id)
    {
        $answers = AnswerModel::get_once($id);

       
        $question = Question::find($question_id);
        return view('answer.edit',compact("answers","question"));
    }
    public function update($id,$url_id, Request $request)
    {
        $mytime = Carbon::now();
        $mytime->toDateTimeString(); 


        $update=Answer::find($id)->first();
       
        $update->isi       =$request->get('isi');
        $update->updated_at=$request->get('updated_at');
        $update->question_id=$request->get('question_id');
        $update->user_id=$request->get('user_id');

        $update->save();

        return redirect()->route('answer',[$url_id])->with('update_answer','jawabban telah di update ');
    }
    public function destroy($id,$question_id)
    {
        $question = answer::find($id);
        $question->delete();
        return redirect()->route('answer',[$question_id])->with('update_answer','jawabban telah di hapus'); 
    }
}
