@extends('layouts.master')

@section('content')
    <div>
        <h1>Pertanyaan</h1>
        <p>Judul : {{ $question->judul }} </p>
        <p>Isi : {{ $question->isi }} </p>
        <p>Tanggal Dibuat : {{ $question->tanggal_dibuat }}</p>
        <p>Tanggal Diupdate : {{ $question->tanggal_diperbaharui}}</p>
    </div>
    
    <div class="ml-3">    
        <form action="/answer/{{$question->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="isi">Isi Jawaban :</label>
                <textarea class="form-control" rows="5" id="isi" placeholder="Masukkan jawaban" name="isi"></textarea>
            </div>
            <input hidden name="question_id" value="{{ $question->id }}" >
            <input hidden name="tanggal_dibuat" value="{{ \Carbon\Carbon::now() }}">
            <input hidden name="tanggal_diperbaharui" value="{{ \Carbon\Carbon::now() }}">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
   

@endsection 