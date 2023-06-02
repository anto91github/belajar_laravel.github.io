@extends('layouts.mainlayout')
@section('title', 'Class Detail')

@section('content')
    <style>
        th {
            width: 25%;
        }
    </style>
 
    <h2>This is class Detail, {{$classData->name}}</h2>
    <h3>Home Room teacher nya : {{$classData->homeroomTeacher->name}}</h3>
   <h3>Student List</h3>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Gender</th>
            <th>Nis</th>
        </tr>
        @foreach ($classData->students as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
                @if ($item->gender == 'P')
                    Perempuan
                @else
                    Laki-Laki
                @endif
            </td>
            <td>
                {{$item->nis}}
            </td>
        </tr>
        @endforeach
    </table>
 

@endsection

