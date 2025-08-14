<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id'     => User::factory(),
            'book_id'     => Book::factory(), // otomatis buat book & category
            'borrowed_at' => now()->subDays(rand(1, 10)),
            'returned_at' => rand(0, 1) ? now() : null,
        ];
    }
}
