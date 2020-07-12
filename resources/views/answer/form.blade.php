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
<h5 class="mt-4">Answer:</h5>
@if(session('create_answer'))
<div class="alert alert-success my-3">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
{{session('create_answer')}}</div>
@elseif(session('update_answer'))
<div class="alert alert-success my-3">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
{{session('update_answer')}}</div>
@elseif(session('delete'))
<div class="alert alert-success my-3">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
{{session('delete')}}</div>
@endif  
 @foreach($answers as $key=>$res)
   
<div id="{{$res->id}}" class="list-group">
   <li id="ini" class="list-group-item list-group-item-action ">
    <p class="mb-1">{!! $res->isi !!}</p>
    <p> Dijawab oleh : {{ $res-> user->name }}</p>
    <div class="row">
     <div  class="col-4 ">
      <button onclick="saveVote({{ Auth::user()->id }},{{$res->id}})" class="btn btn-primary btn-sm"><i class="far fa-thumbs-up"></i></button>
      <button id="v{{$res->id}}" class="btn btn-primary btn-sm" value="{{$count[$key]}}">{{$count[$key]}}</button>
      <button onclick="removeVote({{ Auth::user()->id }},{{$res->id}})" class="btn btn-primary btn-sm"><i class="far fa-thumbs-down"></i></button>
     <a href="{{route('edit',[$res->id,$res->question_id])}}" class="btn btn-info btn-sm"><span class="far fa-edit"></span></a>
    <form action="{{route('delete',[$res->id,$res->question_id])}}" method="post" style="display: inline;">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
    </form>
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
                        "_token": CSRF_TOKEN,
                        "postid": postid,
                        "userid": userid,
                        "status": '1'     
                },
                success: function(data) {
                        var theid = 'v'+postid;
                        var displayvote = document.getElementById(theid).innerHTML;
                        displayvote = parseInt(displayvote)+1;
                        document.getElementById(theid).innerHTML=displayvote;
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
                        "_token": CSRF_TOKEN,
                        "postid": postid,
                        "userid": userid,
                        "status": '0'     
                },
                success: function(data) {
                        var theid = 'v'+postid;
                        var displayvote = document.getElementById(theid).innerHTML;
                        displayvote = parseInt(displayvote)-1;
                        document.getElementById(theid).innerHTML=displayvote;
                },
                error: function(data) {
                        alert(JSON.stringify(data));
                        
                }
        })
        
}
</script>
@endpush
