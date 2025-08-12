@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>📦 Daftar Peminjaman</h3>
    <a href="{{ route('borrows.create') }}" class="btn btn-custom">+ Tambah Peminjaman</a>
</div>
<div class="card p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th><th>Buku</th><th>Peminjam</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($borrows as $borrow)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $borrow->book->title ?? '-' }}</td>
                <td>{{ $borrow->borrower_name }}</td>
                <td>{{ $borrow->borrow_date }}</td>
                <td>{{ $borrow->return_date }}</td>
                <td>
                    <a href="{{ route('borrows.edit', $borrow) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('borrows.destroy', $borrow) }}" method="POST" style="display:inline;">
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
