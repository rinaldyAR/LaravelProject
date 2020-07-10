@extends('layouts.master')

@section('content')
    <div>
        <div>
            <h1>Jawaban Pertanyaan</h1>
            <h3>Judul : {{ $question->judul }}</h3>
            <h5>Isi Pertanyaan : {!! $question->isi!!}</h5>
            <div>
                <h2>Jawaban</h2>
                @foreach($answers as $answer)
                    <p>{!! $answer->isi!!}  Tanggal dibuat : {{ $answer->created_at}}, Tanggal Diperbaharui : {{ $answer->updated_at}}</p>
                @endforeach
            </div>
        </div>
        <a href="/question" class="btn btn-sm btn-success">Kembali</a>
    </div>

@endsection
