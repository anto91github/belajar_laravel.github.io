@extends('layouts.mainlayout')
@section('title', 'Students Detail')

@section('content')
    <style>
        th {
            width: 25%;
        }
    </style>
    <h2>This is student Detail, {{$studentDetail->name}}</h2>
   
    <div class="my-3 d-flex justify-content-center">
        @if ($studentDetail->image !='')
            <img src="{{asset('storage/student_photo/'.$studentDetail->image)}}" width="10%">
        @else
            <img src="{{asset('image/default_avatar.png')}}" width="10%">
        @endif
        
    </div>

    <table class="table table-bordered">
        <tr>
            <th>NIS</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Teacher</th>
        </tr>

        <tr>
            <td>{{$studentDetail->nis}}</td>
            <td>
                @if ($studentDetail->gender == 'P')
                    Perempuan
                @else
                    Laki-Laki
                @endif
            </td>
            <td>
                {{$studentDetail->class1->name}}
            </td>
            <td>
                {{$studentDetail->class1->homeroomTeacher->name}}
            </td>
        </tr>
    </table>
    <div>
        <h3>Daftar Ekskul :</h3>
        <ol>
        @foreach ($studentDetail->ekskuls as $item)
            <li>{{$item->name}}</li>
        @endforeach
        </ol>
    </div>

@endsection

