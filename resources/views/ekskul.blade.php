@extends('layouts.mainlayout')
@section('title', 'Ekskul')

@section('content')
    <h1>This is ekskul</h1>
    <div class="my-3">
        <a href="" class="btn btn-primary">Add Data</a>
    </div>
    <h3>Student Ekskul</h3>
    {{-- <ol>
        @foreach ($studentList as $data)
            <li> {{$data->name}} | {{$data->gender}} | {{$data->nis}}</li>
        @endforeach
    </ol> --}}
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Ekskul</th>
                <th>Anggota</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ekskulList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>
                        @foreach ($data->students as $item)
                        - {{$item['name']}}<br>
                        @endforeach
                    </td>
                    <td><a href="ekskul/{{$data->id}}">Detail</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection

