<!DOCTYPE html>
<html>
<head>
    <title>Profil - E-Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 600px;">
    <h3 class="mb-4">Profil</h3>
    
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">Profil berhasil diperbarui.</div>
    @endif

    {{-- Form Update Profil --}}
    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Profil</button>
    </form>

    <hr>

    {{-- Form Hapus Akun --}}
    <h5>Hapus Akun</h5>
    <form method="POST" action="{{ route('profile.destroy') }}">
        @csrf
        @method('DELETE')

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-danger">Hapus Akun</button>
    </form>
</div>
</body>
</html>
