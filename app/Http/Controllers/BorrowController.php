<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with(['user', 'book'])->latest()->paginate(10);
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('borrows.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'book_id'     => 'required|exists:books,id',
            'borrowed_at' => 'required|date'
        ]);

        Borrow::create($request->all());
        return redirect()->route('borrows.index')->with('success', 'Borrow record created successfully.');
    }

    public function edit(Borrow $borrow)
    {
        $users = User::all();
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'users', 'books'));
    }

    public function update(Request $request, Borrow $borrow)
    {
        $request->validate([
            'returned_at' => 'nullable|date'
        ]);

        $borrow->update($request->all());
        return redirect()->route('borrows.index')->with('success', 'Borrow record updated successfully.');
    }

    public function destroy(Borrow $borrow)
    {
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Borrow record deleted successfully.');
    }
}
