@extends('layouts.master')

@section('content')
    <div>
        <h1>Pertanyaan</h1>
        <p>Judul : {{ $question->judul }} </p>
        <p>Isi : {{ $question->isi }} </p>
        <p>Kebenaran : {{ $question->kebenaran }}</p>
        <p>User ID : {{ $question->user_id}}</p>
        <p>Tanggal Dibuat : {{ $question->created_at}}</p>
        <p>Tanggal Diperbaharui : {{ $question->updated_at}}</p>
    </div>
    
    <div class="ml-3">    
        <form action="/answer/{{$question->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="isi">Isi Jawaban :</label>
                <textarea class="form-control" rows="5" id="isi" placeholder="Masukkan jawaban" name="isi"></textarea>
            </div>
            <input hidden name="question_id" value="{{ $question->id }}" >
            <input hidden name="user_id" value="{{ $question->id }}" >
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   

@endsection 