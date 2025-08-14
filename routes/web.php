<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Halaman welcome
Route::get('/', function () {
    return view('welcome');
});

// Route dashboard untuk Breeze & unit test bawaan
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Import route autentikasi dari Breeze / Fortify
require __DIR__ . '/auth.php';

// Route setelah login
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // CRUD Categories
    Route::resource('categories', CategoryController::class);

    // CRUD Books
    Route::resource('books', BookController::class);

    // CRUD Borrows
    Route::resource('borrows', BorrowController::class);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
