<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class QuestionModel {
    public static function get_all(){
        $question = DB::table('questions')->get();
        return $questions;
    }

    public static function save($data){
        $new_question = DB::table('questions')->insert($data);
        return $new_question;
    }
}