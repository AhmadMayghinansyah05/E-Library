<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_book()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $data = [
            'title' => 'Buku Pemrograman',
            'author' => 'Eghi',
            'year' => 2023,
            'category_id' => $category->id
        ];

        $response = $this->actingAs($user)->post('/books', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('books', $data);
    }

    /** @test */
    public function user_can_update_book()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->actingAs($user)->put("/books/{$book->id}", [
            'title' => 'Buku Laravel Update',
            'author' => 'Eghi',
            'year' => 2024,
            'category_id' => $book->category_id
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('books', ['title' => 'Buku Laravel Update']);
    }

    /** @test */
    public function user_can_delete_book()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $response = $this->actingAs($user)->delete("/books/{$book->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }
}
