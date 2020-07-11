@extends('layouts.master')

@section('content')
    <div class="ml-3 mt-3">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Pertanyaan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="/question" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="judul">Judul Pertanyaan</label>
                    <input type="text" class="form-control" id="judul" name = "judul" placeholder="Judul Pertanyaan">
                  </div>
                  <div class="form-group">
                    <label for="isi">Masukkan Pertanyaan</label>
                    <textarea class="form-control" id="isi" name = "isi" placeholder="Isi Pertanyaan" cols="30" rows="10"></textarea>
                  </div>
                  <input hidden name="created_at" value="{{ \Carbon\Carbon::now() }}">
                  <input hidden name="updated_at" value="{{ \Carbon\Carbon::now() }}">
                  <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control">
                      @foreach($categories as $key => $category)
                        <option value="{{$category->id}}"> {{ $category->name}}</option>
                      @endforeach

                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tags">Tags</label>
                    <input type="text" class="form-control" id="tags" name = "tags" placeholder="tags">
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