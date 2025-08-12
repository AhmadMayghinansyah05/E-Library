<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book')->orderBy('created_at', 'desc')->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $books = Book::orderBy('title')->get();
        return view('borrows.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        Borrow::create($request->only('book_id', 'borrower_name', 'borrow_date', 'return_date'));
        return redirect()->route('borrows.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    public function edit(Borrow $borrow)
    {
        $books = Book::orderBy('title')->get();
        return view('borrows.edit', compact('borrow', 'books'));
    }

    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrower_name' => 'required|string|max:255',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        $borrow->update($request->only('book_id', 'borrower_name', 'borrow_date', 'return_date'));
        return redirect()->route('borrows.index')->with('success', 'Data peminjaman berhasil diupdate.');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
