@extends('Master.master')

@section('content')

    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Total Tasks</h5>
                        <p class="card-text h2">{{ $tasksCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text h2">{{ $usersCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title">Total Of My Tasks</h5>
                        <p class="card-text h2">{{ $myTasksCount }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
