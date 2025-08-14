<?php

namespace Tests\Feature;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BorrowFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_borrow()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $data = [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'borrowed_at' => now()
        ];

        $response = $this->actingAs($user)->post('/borrows', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('borrows', [
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);
    }

    /** @test */
    public function user_can_update_borrow()
    {
        $user = User::factory()->create();
        $borrow = Borrow::factory()->create();

        $response = $this->actingAs($user)->put("/borrows/{$borrow->id}", [
            'returned_at' => now()
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('borrows', ['id' => $borrow->id]);
    }

    /** @test */
    public function user_can_delete_borrow()
    {
        $user = User::factory()->create();
        $borrow = Borrow::factory()->create();

        $response = $this->actingAs($user)->delete("/borrows/{$borrow->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('borrows', ['id' => $borrow->id]);
    }
}
