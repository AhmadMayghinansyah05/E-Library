@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>📖 Daftar Buku</h3>
    <a href="{{ route('books.create') }}" class="btn btn-custom">+ Tambah Buku</a>
</div>
<div class="card p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th><th>Judul</th><th>Penulis</th><th>Kategori</th><th>Tahun</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->category->name ?? '-' }}</td>
                <td>{{ $book->year }}</td>
                <td>
                    <a href="{{ route('books.edit', $book) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
