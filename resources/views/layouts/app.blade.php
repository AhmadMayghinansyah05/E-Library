<!DOCTYPE html>
<html>
<head>
    <title>E-Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8faff; }
        .navbar { background-color: #0d6efd; }
        .navbar-brand, .nav-link, .navbar-toggler-icon { color: white !important; }
        .card { border-radius: 12px; }
        .btn-custom { background-color: #0d6efd; color: white; border-radius: 8px; }
        .btn-custom:hover { background-color: #0b5ed7; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg px-3">
        <a class="navbar-brand fw-bold" href="{{ route('books.index') }}">📚 E-Library</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Buku</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('borrows.index') }}">Peminjaman</a></li>
                <li class="nav-item">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-custom btn-sm ms-3">Logout</button>
                </form>
            </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
</body>
</html>
