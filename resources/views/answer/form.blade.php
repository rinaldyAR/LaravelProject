@extends('layputs.master')

@section('content')
    <div class="ml-3">
        <form action="/question/{{$question->id}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="isi">Isi Jawaban :</label>
                <textarea class="form-control" rows="5" id="isi" placeholder="Masukkan pertanyaan" name="isi"></textarea>
            </div>
            <input hidden type="text" >
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
   

@endsection 