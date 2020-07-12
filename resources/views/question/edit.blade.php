@extends('layouts.master')

@section('content')
<div class="ml-3 mt-3">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Pertanyaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/question/{{$question->id}}" method="POST">
              @csrf
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control" id="judul" name = "judul" value="{{$question->judul}}">
                  </div>
                  <div class="form-group">
                    <label for="isi">Masukkan Pertanyaan</label>
                    <textarea class="form-control" id="isi" name = "isi"  cols="30" rows="10" >{{$question->isi}}</textarea>
                    <!-- <input type="text" class="form-control" id="isi" name = "isi" value="{{$question->isi}}"> -->
                  </div>
                  <input hidden type="text" name="created_at" value="{{$question->created_at}}">
                  <input hidden type="text" name="updated_at" value="{{ \Carbon\Carbon::now() }}">
                  <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                      @foreach($categories as $category)
                        @if($category->id == $question->category_id)
                          <option value="{{$category->id}}" selected>{{$category->name}}</option>
                        @else
                           <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                        

                      @endforeach
                    
                    </select>
                  
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
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
