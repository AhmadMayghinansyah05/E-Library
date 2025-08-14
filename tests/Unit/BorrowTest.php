<?php

namespace Tests\Unit;

use App\Models\Borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BorrowTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function borrow_belongs_to_user_and_book()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();
        $borrow = Borrow::factory()->create([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);

        $this->assertInstanceOf(User::class, $borrow->user);
        $this->assertInstanceOf(Book::class, $borrow->book);
    }
}
