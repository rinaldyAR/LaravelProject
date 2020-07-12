<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $primaryKey = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $kebenaran = 'kebenaran';
    protected $judul = 'judul';
    protected $isi = 'isi';
    protected $user_id = 'user_id';
    protected $category_id = 'category_id';

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag', 'question_tag', 'question_id', 'tag_id');
    }

    public function votes(){
        return $this->belongsToMany('App\User', 'vote_question', 'question_id', 'user_id');
    }


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}


