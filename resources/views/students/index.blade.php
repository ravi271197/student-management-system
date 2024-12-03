@extends('layouts.user.index')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{!! route('students.create') !!}" class="btn btn-primary">Create</a>
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
                @foreach ($students as $key => $value)
                    <tr>
                        <th scope="row">{!! $i++ !!}</th>
                        <td>{!! $value->first_name !!}</td>
                        <td>{!! $value->last_name !!}</td>
                        <td>{!! $value->email !!}</td>
                        <td class="d-flex gap-2">
                            <a href="{!! route('students.edit', ['id' => $value->id]) !!}" class="btn btn-info">Edit</a>
                            <form action="{!! route('students.delete', ['id' => $value->id]) !!}" method="POST">
                                @csrf
                                <input type="submit" value="Delete" name="Delete" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
