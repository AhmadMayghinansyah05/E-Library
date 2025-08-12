<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BorrowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // CRUD Books
    Route::resource('books', BookController::class);

    // Download PDF Book (dengan proteksi login)
    Route::get('books/{book}/download', [BookController::class, 'download'])
        ->name('books.download');

    // CRUD Categories
    Route::resource('categories', CategoryController::class);

    // Borrow Reports
    Route::get('borrows', [BorrowController::class, 'index'])->name('borrows.index');

    // Borrow Action
    Route::post('borrow/{book}', [BorrowController::class, 'store'])->name('borrows.store');
});

require __DIR__.'/auth.php';    
