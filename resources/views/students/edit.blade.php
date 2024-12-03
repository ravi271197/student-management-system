@extends('layouts.user.index')

@section('content')
    <div class="container">
        <h3>Update Students</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{!! route('students.update', ['id' => $student->id]) !!}" method="post">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="first Name" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="first_name" name="first_name"
                        value="{!! $student->first_name !!}" placeholder="First Name">
                </div>
                <div class="mb-3">
                    <label for="last Name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name"
                        value="{!! $student->last_name !!}" placeholder="Last Name">
                </div>
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>

@endsection
