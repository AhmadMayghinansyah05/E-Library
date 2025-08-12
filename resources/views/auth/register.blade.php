@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="mb-4 text-center">Register</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Daftar</button>
        <div class="mt-3 text-center">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>
    </form>
</div>
@endsection
