@extends('layouts.master')

@section('content')
    <a href="/categories/create" class="btn btn-primary mt-3 ml-3">Buat Kategori Baru</a>
    <div class="ml-3 mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $category->name }}</td>
                </tr>
                @endforeach
            </tbody>
        
        </table>
        
        </form>
    </div>

@endsection