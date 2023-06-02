@extends('layouts.mainlayout')
@section('title', 'Teacher Detail')

@section('content')
    <style>
        th {
            width: 25%;
        }
    </style>
 
    <h2>This is teacher Detail, {{$teacherList->name}}</h2>
    <h3>Kelas, {{$teacherList->class2->name}}</h3>
   
    {{-- {{$teacherList->class2->students}} --}}
   <h3>Student List</h3>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <th>Gender</th>
            <th>Nis</th>
        </tr>
        @foreach ($teacherList->class2->students as $item)
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

