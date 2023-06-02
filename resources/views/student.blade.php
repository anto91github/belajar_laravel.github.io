@extends('layouts.mainlayout')
@section('title', 'Students')

@section('content')
    <h1>This is student</h1>
    <div class="my-3 d-flex justify-content-between">
        <a href="student-add" class="btn btn-primary">Add Data</a>
        <a href="student-deleted" class="btn btn-info">Show Deleted Data</a>
    </div>
    
    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif

    <h3>Student List</h3>

    <div class="my-3 col-12 col-sm-6 col-md-5">
        <form action="" method="get">
            <div class="input-group mb-3 ">
                <input type="text" class="form-control" name="keyword" placeholder="Keyword">
                <button class="input-group-text btn btn-primary">Search</button>
              </div>
        </form>
    </div>
    {{-- <ol>
        @foreach ($studentList as $data)
            <li> {{$data->name}} | {{$data->gender}} | {{$data->nis}}</li>
        @endforeach
    </ol> --}}
    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Nis</th>
                <th>Class Id</th>
                <th>Class Name</th>
                <th>Ekskul</th>
                <th>Teacher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($studentList as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->gender}}</td>
                    <td>{{$data->nis}}</td>
                    <td>{{$data->class_id}}</td>
                    <td>{{$data->class1['name']}}</td>
                    <td>
                        @foreach ($data['ekskuls'] as $item)
                        {{$item['name']}}<br>
                        @endforeach
                    </td>
                    <td>{{$data->class1->homeroomTeacher->name}}</td>
                    <td>
                        @if (Auth::User()->role_id == 1 || Auth::User()->role_id == 2)
                            <a href="students/{{$data->id}}">Detail</a>
                            <a href="student-edit/{{$data->id}}">Edit</a>
                        @else
                            -
                        @endif
                        
                        <a href="student-delete/{{$data->id}}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="my-5">
        {{ $studentList->withQueryString()->links() }}
    </div>
   

@endsection

