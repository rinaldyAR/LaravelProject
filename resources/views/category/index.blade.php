@extends('layouts.master')

@section('content')
<div class="card">
    <div class="card-header">
        <h5>Category</h5>
    </div>
    <div class="card-body">
        <a href="/categories/create" class="btn btn-primary mt-3 ml-3">Buat Kategori Baru</a>
        @if(session('create'))
        <div class="alert alert-success my-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        {{session('create')}}</div>

        @elseif(session('edit'))
            <div class="alert alert-success my-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session('edit')}}</div>
        @elseif(session('delete'))

            <div class="alert alert-success my-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{session('delete')}}</div>
        @endif
        
        <div class="ml-3 mt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key => $category)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td><a href="{{action('CategoryController@edit',$category->id)}}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{action('CategoryController@destroy',$category->id)}}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>

        </form>
    </div>
</div>
</div>

@endsection