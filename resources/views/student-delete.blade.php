@extends('layouts.mainlayout')
@section('title', 'Add New Student')

@section('content')
    <div class="mt-5">
        <h2>Yakin menghapus data : {{$student->name}} ({{$student->nis}})</h2>
        <form action="/student-destroy/{{$student->id}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">Delete</button>
            <a href="/students" class="btn btn-primary">Cancel</a>
        </form>
        
        
    </div>
@endsection

