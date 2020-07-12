@extends('layouts.master')

@section('content')
    <div class="ml-3 mt-3">
        <form action="{{action('CategoryController@update',$file->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form group">
                <label for="name">Nama Kategori</label>
                <input class="form-control" type="text" name="name" placeholder="Isi nama kategori" value="{{$file->name}}">

                <input class="btn btn-primary mt-2" type="submit" value="Update Kategori">
            </div>
        </form>
    </div>

@endsection