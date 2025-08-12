@extends('layouts.app')

@section('content')
<h3>✏ Edit Buku</h3>
<div class="card p-3">
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Judul Buku</label>
            <input type="text" name="title" value="{{ $book->title }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Penulis</label>
            <input type="text" name="author" value="{{ $book->author }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun</label>
            <input type="number" name="year" value="{{ $book->year }}" class="form-control" required>
        </div>
        <button class="btn btn-custom">Update</button>
    </form>
</div>
@endsection
