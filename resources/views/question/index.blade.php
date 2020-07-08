@extends('layouts.master')

@section('content')
    <div class="ml-3 mt-3">
    <h1>Daftar Pertanyaan</h1>
        <a href="/question/create" class="btn btn-primary">
            Tambah Pertanyaan
        </a>
        <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Pertanyaan</th>
                        <th>Isi Pertanyaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($questions as $question)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $question->judul }}</td>
                        <td>{{ $question->isi }}</td>  
                        <td>
                            <a href="answer/{{$question->id}}" class="btn btn-sm btn-success">Jawab</a>
                            <a href="#" class="btn btn-sm btn-primary">Lihat QnA</a>
                            <a href="#" class="btn btn-sm btn-warning">Edit</a>
                            <form action="#" method="POST" style="display: inline">
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>          
                    </tr>
                    @endforeach
                </tbody>
        </table>
       
    </div>
    
    
@endsection