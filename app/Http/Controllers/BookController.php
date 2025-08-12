<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->orderBy('created_at', 'desc')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')+1),
        ]);

        Book::create($request->only('title', 'author', 'category_id', 'year'));
        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'category_id' => 'required|exists:categories,id',
            'year' => 'required|digits:4|integer|min:1900|max:' . (date('Y')+1),
        ]);

        $book->update($request->only('title', 'author', 'category_id', 'year'));
        return redirect()->route('books.index')->with('success', 'Buku berhasil diupdate.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
