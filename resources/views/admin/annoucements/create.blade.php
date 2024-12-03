@extends('layouts.admin.index')

@section('content')
    <h3>Create Announcements</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{!! route('admin.annoucements.store') !!}" method="post">
        @csrf
        <div>
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">content</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            </div>
            <input type="submit" value="submit" class="btn btn-primary">
        </div>
    </form>
@endsection
