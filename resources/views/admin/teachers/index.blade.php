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
    <h3>Manage Teachers</h3>
    <a href="{!! route('admin.teachers.create') !!}" class="btn btn-primary mt-3 mb-3">Create</a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach ($teachers as $key => $value)
                <tr>
                    <th scope="row">{!! $i++ !!}</th>
                    <td>{!! $value->first_name !!}</td>
                    <td>{!! $value->last_name !!}</td>
                    <td>{!! $value->email !!}</td>
                    <td class="d-flex gap-2">
                        <a href="{!! route('admin.teachers.edit', ['id' => $value->id]) !!}" class="btn btn-info">Edit</a>
                        <form action="{!! route('admin.teachers.delete', ['id' => $value->id]) !!}" method="POST">
                            @csrf
                            <input type="submit" value="Delete" name="Delete" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
