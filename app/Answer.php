<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $primaryKey = 'id';
    const CREATED_AT = 'tanggal_dibuat';
    const UPDATED_AT = 'tanggal_diperbaharui';
    protected $question_id = 'question_id';
    protected $isi = 'isi';

    public function votes(){
        return $this->belongsToMany('App\User', 'vote_answers', 'id', 'user_id');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

}
