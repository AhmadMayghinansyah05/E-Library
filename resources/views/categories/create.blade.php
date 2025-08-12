@extends('layouts.app')

@section('content')
<h3>➕ Tambah Kategori</h3>
<div class="card p-3">
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button class="btn btn-custom">Simpan</button>
    </form>
</div>
@endsection
