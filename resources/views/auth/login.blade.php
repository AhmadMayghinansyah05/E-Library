@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Login</h2>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" name="remember" class="form-check-input">
            <label class="form-check-label">Ingat saya</label>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
        <div class="mt-3 text-center">
            <a href="{{ route('password.request') }}">Lupa Password?</a> | 
            <a href="{{ route('register') }}">Daftar</a>
        </div>
    </form>
</div>
@endsection
