@extends('layouts.mainlayout')
@section('title', 'Students')

@section('content')
    <h1>This is Class</h1>
    <div class="my-3">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>
    <h3>Class List</h3>
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Students</th>
                <th>Teachers</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($classList as $data)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$data->name}}</td>
                <td>
                    @foreach ($data->students as $student)
                        {{$student['name']}} <br>
                    @endforeach
                </td>
                <td>
                    
                        {{$data->homeroomTeacher->name}} <br>
                    
                </td>
                <td><a href="class/{{$data->id}}">Detail</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

