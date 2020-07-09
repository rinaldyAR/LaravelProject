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
}
