@extends('layouts.user.index')

@section('content')
    <div class="container">
        <h3>Update Annoucements</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{!! route('annoucements.update', ['id' => $anc->id]) !!}" method="post">
            @csrf
            <div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{!! $anc->title !!}"
                        placeholder="Title">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">content</label>
                    <input type="text" class="form-control" id="content" name="content" value="{!! $anc->content !!}"
                        placeholder="content">
                </div>
                <input type="submit" value="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection
