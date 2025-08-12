@extends('layouts.app')

@section('content')
<h3>➕ Tambah Buku</h3>
<div class="card p-3">
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="year" class="form-control" required>
        </div>
        <button class="btn btn-custom">Simpan</button>
    </form>
</div>
@endsection
