@extends('layouts.master')

@section('content')


<!-- Head -->
<div class="card">
 <div class="card-body">
  <div class="list-group">
   <li  class="list-group-item list-group-item-action active">
    <div class="d-flex w-100 justify-content-between">
     <h2 class="mb-1 ">{{ $question->judul }}</h2>
    </div>
    <hr>
    <p class="mb-1">{!! $question->isi !!}</p>
    <div class="row">
      <div class="col-12">
       @foreach($question ->tags as $tag )
        <button class="btn btn-info btn-sm">{{$tag->tag_name}}</button>
       @endforeach
        
      </div>
      <small>Tanggal Dibuat     : {{ $question->created_at }}</small>
      <small>Tanggal Update   : {{ $question->updated_at}}</small>
    </div>
   </li>
  </div>

   <hr>
   <div class="mt-5">
   <h5 class="my-3">Jawabban Kamu :</h5>
   <form action="{{route('update',[$answers->id,$question->id])}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
     <textarea class="form-control" rows="5" id="isi" placeholder="Masukkan jawaban" name="isi">{{$answers->isi}}</textarea>
    </div>
    <input hidden name="question_id" value="{{ $question->id }}">
    <input hidden name="user_id" value=" {{ Auth::user()->id }}">
    <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
    <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">

    <button type="submit" class="btn btn-primary">Update</button>
   </form>
  </div>
 </div>
</div>

<script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
                            .create( document.querySelector( '#isi' ) )
                            .then( isi => {
                                    console.log( isi );
                            } )
                            .catch( error => {
                                    console.error( error );
                            } );
</script>
@endsection
