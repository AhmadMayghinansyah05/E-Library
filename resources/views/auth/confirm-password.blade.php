<!DOCTYPE html>
<html>
<head>
    <title>Konfirmasi Password - E-Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 400px;">
    <h3 class="mb-4 text-center">Konfirmasi Password</h3>

    <p class="text-center mb-4">Silakan masukkan password Anda untuk melanjutkan.</p>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required autofocus>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100">Konfirmasi Password</button>
    </form>
</div>
</body>
</html>
