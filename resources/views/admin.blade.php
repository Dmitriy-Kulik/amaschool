@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--<div class="card-header">Dashboard</div>--}}
                    @if (Auth::user()->name == 'admin')
                        <div class="card-header">
                            <h1>Admin panel</h1>
                        </div>
                    @endif
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h3>Your status - {{Auth::user()->name}}</h3>
                        Your name {{Auth::user()->name}}<br>
                    </div>
                </div>
            </div>
        </div>
    </div><br>
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
