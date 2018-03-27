@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>isAdmin</th>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>{{ $user->isAdmin }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection