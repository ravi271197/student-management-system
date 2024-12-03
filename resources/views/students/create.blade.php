@extends('layouts.user.index')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{!! route('students.store') !!}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="first name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name"
                    placeholder="Enter Your First Name">
            </div>
            <div class="mb-3">
                <label for="last name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name"
                    placeholder="Enter Your Last Name">
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
        </form>

    </div>
@endsection
