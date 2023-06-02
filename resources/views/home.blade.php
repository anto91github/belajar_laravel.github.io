@extends('layouts.mainlayout')
@section('title', 'Home')

@section('content')
    <h1>This is home</h1>
    <h2>Welcome, {{Auth::user()->name}}. You are, {{Auth::user()->role->name}}</h2>

    {{-- @if ($role == 'admin')
        <a href="">ke halaman admin</a>
    @elseif ($role == 'staff')
        <a href="">ke halaman gudang</a>
    @endif --}}

    <table class="table">
        <tr>
            <th>No.</th>
            <th> Nama Buah </th>
        </tr>
        {{-- @foreach ($buah as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item}}</td>
            </tr>
        @endforeach --}}
    </table>

    

@endsection

