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
        <a href="{!! route('annoucements.create') !!}" class="btn btn-primary">Create</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach ($anc as $key => $value)
                    <tr>
                        <th scope="row">{!! $i++ !!}</th>
                        <td>{!! $value->title !!}</td>
                        <td>{!! $value->content !!}</td>
                        <td class="d-flex gap-2">
                            <a href="{!! route('annoucements.edit', ['id' => $value->id]) !!}" class="btn btn-info">Edit</a>
                            <form action="{!! route('annoucements.delete', ['id' => $value->id]) !!}" method="POST">
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
