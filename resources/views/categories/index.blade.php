@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>📂 Daftar Kategori</h3>
    <a href="{{ route('categories.create') }}" class="btn btn-custom">+ Tambah Kategori</a>
</div>
<div class="card p-3">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th><th>Nama</th><th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
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
