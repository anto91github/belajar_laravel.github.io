@extends('layouts.mainlayout')
@section('title', 'Add New Student')

@section('content')
    <div class="mt-5">
        <form action="student" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 col-8 m-auto">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <label for="name">Name</label>
                <input type="text"  class="form-control" name="name" id="name">
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-control" required>
                    <option value="">Select One</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="nis">NIS</label>
                <input type="text" class="form-control" name="nis" id="nis" required>
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="class">Class</label>
                <select name="class_id" id="class_id" class="form-control" required>
                    <option value="">Select One</option>
                    @foreach ($classList as $item)
                        <option value={{$item->id}}>{{$item->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 col-8 m-auto">
                <label for="class">Image</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="photo" name="photo">
                  </div>
            </div>

            <div class="mb-3 col-8 m-auto">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection

