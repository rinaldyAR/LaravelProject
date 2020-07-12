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
use App\User;

use App\Vote_answer;
class AnswerController extends Controller
{
    public function index($question_id){
        // dd('masuk');
        $answers = Answer::where('question_id','=',$question_id)->get();
        // dd($answers);
        // $question = QuestionModel::find_by_id($question_id);
        $question = Question::where('id',$question_id)->first();

        // dd($question->tags);
        $user = User::where('id', $question_id)->first();
        // dd($user);
        $count = self::totalCount($answers);
        //dd($count);
        return view('answer.form', compact('answers', 'question','count', 'user'));
    }
    public function totalCount($data){
        $temp = [];
        foreach($data as $dat){
            array_push($temp,Vote_answer::where('answare_id','=',$dat->id)->where('status','=',1)->count());
        }
        return $temp;
    }

    public function store($question_id, Request $request){
        $data = $request->all();
        // dd($question_id);
        unset($data["_token"]);
        AnswerModel::save($data);

        return redirect()->route('indexjawaban',[$question_id])->with('create_answer','commentar telah di buat');
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

        return redirect()->route('indexjawaban',[$url_id])->with('update_answer','jawabban telah di update ');
    }
    public function destroy($id,$question_id)
    {
        $question = answer::find($id);
        $question->delete();

        return redirect('/answer/'.$question_id);
    }

    public function updateAjax(Request $request){
        $ansid = $request->postid;
        $userid = $request->userid;
        $status = $request->status;
        //dd($request);
        //Log::debug('Some message.');

        echo "asasas";
        $answer = Vote_answer::where('user_id','=',$userid)->where('answare_id','=',$ansid)->count();
        if($answer < 1){
            $answer = new Vote_answer;
            $answer->user_id = $userid;
            $answer->answare_id = $ansid;
            $answer->status = $status;
            $answer->save();
            exit;
        }else{
            $answer = Vote_answer::where('user_id','=',$userid)->where('answare_id','=',$ansid)->first();
            $answer->status = $status;
            $answer->save();
            exit;
        }
        exit;
    }
}
