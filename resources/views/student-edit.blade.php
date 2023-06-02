@extends('layouts.mainlayout')
@section('title', 'Edit Student')

@section('content')
    <div class="mt-5">
        <form action="/student/{{$studentDetail->id}}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3 col-8 m-auto">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$studentDetail->name}}" required>
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="{{$studentDetail->gender}}">{{$studentDetail->gender}}</option>
                    @if ($studentDetail->gender == 'L')
                        <option value="P">P</option>
                    @else
                        <option value="L">L</option>
                    @endif
                </select>
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="nis">NIS</label>
                <input type="text" class="form-control" name="nis" id="nis" value="{{$studentDetail->nis}}" required>
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="class">Class</label>
                <select name="class_id" id="class_id" class="form-control" required>
                    <option value="{{$studentDetail->class1->id}}">{{$studentDetail->class1->name}}</option>
                    @foreach ($classList as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-8 m-auto">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

