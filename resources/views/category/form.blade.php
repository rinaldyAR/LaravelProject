@extends('layouts.master')

@section('content')
    <div class="ml-3 mt-3">
        <form action="/categories" method="POST">
            @csrf 
            <div class="form group">
                <label for="name">Nama Kategori</label>
                <input class="form-control" type="text" name="name" placeholder="Isi nama kategori">

                <input class="btn btn-primary mt-2" type="submit" value="Tambah Kategori">
            </div>
        </form>
    </div>

@endsection