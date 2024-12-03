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
    <h3>Students</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
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

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
