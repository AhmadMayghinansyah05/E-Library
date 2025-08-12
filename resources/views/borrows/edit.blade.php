@extends('layouts.app')

@section('content')
<h3>✏ Edit Peminjaman</h3>
<div class="card p-3">
    <form action="{{ route('borrows.update', $borrow) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Buku</label>
            <select name="book_id" class="form-select" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Nama Peminjam</label>
            <input type="text" name="borrower_name" value="{{ $borrow->borrower_name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Pinjam</label>
            <input type="date" name="borrow_date" value="{{ $borrow->borrow_date }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Kembali</label>
            <input type="date" name="return_date" value="{{ $borrow->return_date }}" class="form-control">
        </div>
        <button class="btn btn-custom">Update</button>
    </form>
</div>
@endsection
