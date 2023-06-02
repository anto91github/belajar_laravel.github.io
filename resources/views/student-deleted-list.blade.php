@extends('layouts.mainlayout')
@section('title', 'Students')

@section('content')
    <h1>Deleted Student List</h1>

    <div class="mt-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Nis</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($studentDeleted as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->nis}}</td>
                    <td><a href="/student/{{$data->id}}/restore">Restore</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection