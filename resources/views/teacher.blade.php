@extends('layouts.mainlayout')
@section('title', 'Teacher')

@section('content')
    <h1>This is teacher</h1>
    <div class="my-3">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>
    <h3>Teacher List</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teacherList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td><a href="/teacher/{{$data->id}}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

