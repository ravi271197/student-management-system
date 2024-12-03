@extends('layouts.admin.index')

@section('content')
    <h3>Create Teachers</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{!! route('admin.teachers.update', ['id' => $teacher->id]) !!}" method="post">
        @csrf
        <div>
            <div class="mb-3">
                <label for="first Name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{!! $teacher->first_name !!}"
                    placeholder="First Name">
            </div>
            <div class="mb-3">
                <label for="last Name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{!! $teacher->last_name !!}"
                    placeholder="Last Name">
            </div>
            <div class="mb-3">

                <select class="form-select" name="department" aria-label="Default select example">
                    <option>Select Department</option>
                    <option value="1" {{ $teacher->department == 1 ? 'selected' : '' }}>Mathematics</option>
                    <option value="2" {{ $teacher->department == 2 ? 'selected' : '' }}>Science</option>
                    <option value="3" {{ $teacher->department == 3 ? 'selected' : '' }}>Arts</option>
                </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="designation" aria-label="Default select example">
                    <option selected>Select Designation</option>
                    <option value="1" {{ $teacher->designation == 1 ? 'selected' : '' }}>Professor</option>
                    <option value="2" {{ $teacher->designation == 2 ? 'selected' : '' }}>Assistant</option>
                    <option value="3" {{ $teacher->designation == 3 ? 'selected' : '' }}>Lecturer</option>
                </select>
            </div>
            <input type="submit" value="submit" class="btn btn-primary">
        </div>
    </form>
@endsection
