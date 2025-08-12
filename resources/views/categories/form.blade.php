@extends('layouts.app')

@section('content')
<h3>{{ isset($category) ? 'Edit Category' : 'Add Category' }}</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
            @csrf
            @if(isset($category))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name ?? old('name') }}" required>
            </div>
            <button class="btn btn-primary">{{ isset($category) ? 'Update' : 'Save' }}</button>
        </form>
    </div>
</div>
@endsection
