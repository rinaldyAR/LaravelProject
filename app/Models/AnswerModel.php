<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class AnswerModel{
    public static function find_by_question_id($id_question){
        $item = DB::table('answers') where('answer_id', $id_question)->get();
        return $item;
    }
}