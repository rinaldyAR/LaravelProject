<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class AnswerModel{
    public static function find_by_question_id($question_id){
        $item = DB::table('answers')->where('question_id', $question_id)->get();
        return $item;
    }

    public static function save($data){
        dd($data);
        $new_answer = DB::table('answers')->insert($data);
        return $new_asnwer;
    }
}