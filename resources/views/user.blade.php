@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    {{--<div class="card-header">Dashboard</div>--}}
                    @if (Auth::user()->name == 'user')
                        <div class="card-header">
                            <h1>User panel</h1>
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
    </div>
@endsection

