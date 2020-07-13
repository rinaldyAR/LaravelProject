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

        @foreach($question->tags as $tag)
                <button class="btn btn-success btn-sm"> {{$tag->tag_name}}</button>
        @endforeach
        <br>
                <small>Dibuat oleh: {{ $question-> user -> name }}</small>
        <br>
                <small>Kategori : {{ $question -> category->name}}</small>
        <br>
                <small>Tanggal Dibuat : {{ $question->created_at }}</small>
                <small>Tanggal Update : {{ $question->updated_at}}</small>
        
   </li>
  </div>
  <h5 class="mt-4">Answer:</h5>
   @foreach($answers as $key=>$res)
   
<div id="{{$res->id}}" class="list-group">
   <li id="ini" class="list-group-item list-group-item-action ">
    <p class="mb-1">{!! $res->isi !!}</p>
    <p> Dijawab oleh : {{ $res-> name }}</p>
    <div class="row">
     <div  class="col-4 ">
      <button onclick="saveVote({{ Auth::user()->id }},{{$res->id}})" class="btn btn-primary btn-sm"><i class="far fa-thumbs-up"></i></button>
      <button id="v{{$res->id}}" class="btn btn-primary btn-sm" value="{{$count[$key]}}">{{$count[$key]}}</button>
      <button onclick="removeVote({{ Auth::user()->id }},{{$res->id}})" class="btn btn-primary btn-sm"><i class="far fa-thumbs-down"></i></button>
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
   <h5 class="my-3">Jawaban Kamu :</h5>
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

@push('jqueri')
<script>

function saveVote(userid,postid){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log(userid+' '+postid)
        jQuery.ajax({
                url: "/updateAjax",
                type: "POST",
                data: {
                        _token: CSRF_TOKEN,
                        postid: postid,
                        userid: userid,
                        status: '1'			
                },
                dataType: 'json',
                success: function(data) {
                        alert(JSON.stringify(data));
                },
                error: function(data) {
                        alert(JSON.stringify(data));
                }
        })
}

function removeVote(userid,postid){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        console.log(userid+' '+postid)
        jQuery.ajax({
                url: "/updateAjax",
                type: "POST",
                data: {
                        _token: CSRF_TOKEN,
                        postid: postid,
                        userid: userid,
                        status: '0'			
                },
                dataType: 'json',
                success: function(data) {
                        alert(JSON.stringify(data));
                },
                error: function(data) {
                        alert(JSON.stringify(data));
                }
        })
}
</script>
@endpush