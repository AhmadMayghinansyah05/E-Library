@extends('layouts.app')

@section('content')
<h3>➕ Tambah Peminjaman</h3>
<div class="card p-3">
    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Buku</label>
            <select name="book_id" class="form-select" required>
                <option value="">-- Pilih Buku --</option>
                @foreach($books as $book)
                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="borrower_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="borrow_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="return_date" class="form-control">
        </div>
        <button class="btn btn-custom">Simpan</button>
    </form>
</div>
@endsection
