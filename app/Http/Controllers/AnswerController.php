<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnswerModel;
use App\Models\QuestionModel;
use \Carbon\Carbon;
// model custom

// model eloquent
use App\Question;
use App\Answer;
use App\Vote_answers;
class AnswerController extends Controller
{
    public function index($question_id){
        // dd('masuk');
        $answers = AnswerModel::find_by_question_id($question_id);
        $question = QuestionModel::find_by_id($question_id);
        // dd($answers);
        $count = self::totalCount($answers);
        //dd($count);
        return view('answer.form', compact('answers', 'question','count'));
    }
    public function totalCount($data){
        $temp = [];
        foreach($data as $dat){
            array_push($temp,Vote_answers::where('answare_id','=',$dat->id)->where('status','=',1)->count());
        }
        return $temp;
    }

    public function store($question_id, Request $request){
        // dd('test');
        // dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        AnswerModel::save($data);
        return redirect('/question');
    }

    public function updateAjax(Request $request){
        $ansid = $request->postid;
        $userid = $request->userid;
        $status = $request->status;
        //dd($request);
        //Log::debug('Some message.');

        echo "asasas";
        $answer = Vote_answers::where('user_id','=',$userid)->where('answare_id','=',$ansid)->first();

        $answer->status = $status;
        $answer->save();
        exit;
    }
}
