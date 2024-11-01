@extends('Master.master')

@section('content')
    <div class="container vh-100 d-flex align-items-center justify-content-center">
        <div class="text-center">
            <h1 class="text-danger mb-5">Welcome to our website. Login to see what you want!</h1>

            <div class="d-flex justify-content-center gap-4">
                <a href="{{ route('login') }}" class="btn btn-primary px-4">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success px-4">Register</a>
            </div>
        </div>
    </div>
@endsection
