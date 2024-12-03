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
    <form action="{!! route('admin.teachers.store') !!}" method="post">
        @csrf
        <div>
            <div class="mb-3">
                <label for="first Name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
            </div>
            <div class="mb-3">
                <label for="last Name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
            </div>
            <div class="mb-3">
                
                <select class="form-select" name="department" aria-label="Default select example">
                    <option selected>Select Department</option>
                    <option value="1">Mathematics</option>
                    <option value="2">Science</option>
                    <option value="3">Arts</option>
                  </select>
            </div>
            <div class="mb-3">
                <select class="form-select" name="designation" aria-label="Default select example">
                    <option selected>Select Designation</option>
                    <option value="1">Professor</option>
                    <option value="2">Assistant</option>
                    <option value="3">Lecturer</option>
                  </select>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            </div>

            <input type="submit" value="submit" class="btn btn-primary">
        </div>
    </form>
@endsection
