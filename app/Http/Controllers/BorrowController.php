<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with(['book', 'user'])->latest()->paginate(10);
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $books = Book::all();
        return view('borrows.create', compact('books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        Borrow::create([
            'book_id' => $request->book_id,
            'user_id' => Auth::id(),
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date,
        ]);

        return redirect()->route('borrows.index')->with('success', 'Book borrowed successfully.');
    }

    public function show(Borrow $borrow)
    {
        return view('borrows.show', compact('borrow'));
    }

    public function edit(Borrow $borrow)
    {
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'books'));
    }

    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:borrow_date',
        ]);

        $borrow->update($request->all());

        return redirect()->route('borrows.index')->with('success', 'Borrow updated successfully.');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();

        return redirect()->route('borrows.index')->with('success', 'Borrow deleted successfully.');
    }
}
