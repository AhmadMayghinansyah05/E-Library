<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi Email - E-Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5" style="max-width: 500px;">
    <h3 class="mb-4 text-center">Verifikasi Email</h3>

    @if (session('resent'))
        <div class="alert alert-success">
            Link verifikasi baru telah dikirim ke email Anda.
        </div>
    @endif

    <p>Mohon verifikasi email Anda dengan klik link yang sudah kami kirim.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn btn-primary">Kirim Ulang Link Verifikasi</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
</div>
</body>
</html>
