@extends('layouts.mainlayout')
@section('title', 'Ekskul Assignment')

@section('content')
<script type="text/javascript" src="{{ asset('js/ekskul-asignment.js') }}"></script>

    <h1>Add Student-Ekskul Here</h1>
    <form action="ekskul-asig-add" method="post">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-1">#</div>
                <div class="col-4">Student Name</div>
                <div class="col-3">Ekskul</div>
                <div class="col-3">Cost</div>
                <div class="col-1"></div>
            </div>
            <div class="parent">
                <div class="ekskul-item row my-2">
                    <div class="col-1 number-item">1</div>
                    <div class="col-4">
                        <select name="student_name[]" class="form-control" required>
                            <option value="">Select Student</option>
                            @foreach ($student as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <select name="ekskul[]" class="form-control" onchange="setEkskulPrice(this)" required>
                            <option value="">Select Ekskul</option>
                            @foreach ($ekskul as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" name="price[]" onchange="calculatePrice()" value="0">
                    </div>
                    <div class="col-1">
                        <button type="button" class="btn btn-success" onclick="addElement()">+</button>
                    </div>
                </div>
            </div>
            
            <div class="my-3 float-end">
                <div>
                    Total : <span class="total-label font-weight-bold">0</span>
                </div>
                <div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
        
        
    </form>

    

@endsection

