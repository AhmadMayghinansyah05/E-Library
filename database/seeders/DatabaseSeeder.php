<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user contoh
        $user = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        // Buat kategori, buku, dan peminjaman
        Category::factory(5)
            ->has(Book::factory(3))
            ->create();

        Borrow::factory(5)->create();
    }
}
