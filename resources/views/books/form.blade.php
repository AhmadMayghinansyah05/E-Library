@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-4">{{ isset($book) ? 'Edit Book' : 'Add Book' }}</h1>

    <form action="{{ isset($book) ? route('books.update', $book) : route('books.store') }}"
          method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @if(isset($book))
            @method('PUT')
        @endif

        <div>
            <label class="block font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $book->title ?? '') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Author</label>
            <input type="text" name="author" value="{{ old('author', $book->author ?? '') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-medium mb-1">Category</label>
            <select name="category_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Select Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block font-medium mb-1">PDF File</label>
            <input type="file" name="pdf" class="w-full border rounded px-3 py-2" {{ isset($book) ? '' : 'required' }}>
            @if(isset($book))
                <p class="text-sm text-gray-500 mt-1">Leave empty if you don’t want to change the file.</p>
            @endif
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('books.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">
                Cancel
            </a>
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
