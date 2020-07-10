@extends('layouts.master')

@section('content')
<<<<<<< HEAD
<div class="card">
 <div class="card-body">
  <div class="list-group">
   <li  class="list-group-item list-group-item-action active">
    <div class="d-flex w-100 justify-content-between">
     <h2 class="mb-1 ">{{ $question->judul }}</h2>
    </div>
    <hr>
    <p class="mb-1">{{ $question->isi }}</p>
    <small>Tanggal Dibuat     : {{ $question->created_at }}</small>
    <small>Tanggal Update   : {{ $question->updated_at}}</small>
   </li>
  </div>
  <h5 class="mt-4">Answer:</h5>
   @foreach($answers as $res)
  <div class="list-group">
   <li class="list-group-item list-group-item-action ">
    <p class="mb-1">{{ $res->isi }}</p>
    <div class="row">
     <div class="col-4 ">
      <button class="btn btn-primary btn-sm"><i class="far fa-thumbs-up"></i></button>
      <button class="btn btn-info btn-sm"><i class="far fa-edit"></i></button>
      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
      <button class="btn btn-info btn-sm"><i class="fas fa-trash"></i></button>
     </div>
     <div class="col-8">
      <small>Tanggal Dibuat    : {{ $res->created_at }}</small>
      <small>Tanggal Update   : {{ $res->updated_at}}</small>
     </div>
    </div>
   </li>
  </div>
    @endforeach

  
   <hr>
   <div class="mt-5">    
   <h5 class="my-3">Jawabban Kamu :</h5>
   <form action="/answer/{{$question->id}}" method="POST">
    @csrf
    <div class="form-group">
     <textarea class="form-control" rows="5" id="isi" placeholder="Masukkan jawaban" name="isi"></textarea>
    </div>
    <input hidden name="question_id" value="{{ $question->id }}">
    <input hidden name="user_id" value=" {{ Auth::user()->id }}">
    <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
    <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
    <button type="submit" class="btn btn-primary">Submit</button>
   </form>
  </div>
 </div>
</div>


@endsection 