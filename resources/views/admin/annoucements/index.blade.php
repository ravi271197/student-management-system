@extends('layouts.admin.index')

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
    <h3>Manage Announcements</h3>
    <a href="{!! route('admin.annoucements.create') !!}" class="btn btn-primary mt-3 mb-3">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Created By</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($ancs as $key => $value)
                <tr>
                    <th scope="row">{!! $i++ !!}</th>
                    <td>{!! $value->title !!}</td>
                    <td>{!! $value->content !!}</td>
                    <td>{!! $value->first_name . ' ' . $value->last_name !!}</td>
                    <td class="d-flex gap-2">
                        <a href="{!! route('admin.annoucements.edit', ['id' => $value->id]) !!}" class="btn btn-info">Edit</a>
                        <form action="{!! route('admin.annoucements.delete', ['id' => $value->id]) !!}" method="POST">
                            @csrf
                            <input type="submit" value="Delete" name="Delete" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
