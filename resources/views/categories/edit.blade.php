@extends('layouts.app')

@section('content')
<h3>✏ Edit Kategori</h3>
<div class="card p-3">
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>
        <button class="btn btn-custom">Update</button>
    </form>
</div>
@endsection
