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

    public static function find_by_id($id){
        $item = DB::table('questions')->where('id', $id)->first();
        return $item;
    }

    public static function update($id, $request){
        $question = DB::table('questions')
                        ->where('id', $id)
                        ->update([
                            'judul' => $request["judul"],
                            'isi' => $request["isi"],
                            'created_at' => $request["created_at"],
                            'update_at' => $request["update_at"],
                            'category_id' => $request["category_id"],
                        ]);
        return $question;
    }

    public static function destroy($id){
        $deleted = DB::table('questions')
                        ->where('id', $id)
                        ->delete();
        return $deleted;
    }
}