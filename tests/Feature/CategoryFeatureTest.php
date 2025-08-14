<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_create_category()
    {
        $user = User::factory()->create();
        $data = ['name' => 'Novel'];

        $response = $this->actingAs($user)->post('/categories', $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', $data);
    }

    /** @test */
    public function user_can_update_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->put("/categories/{$category->id}", [
            'name' => 'Komik'
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('categories', ['name' => 'Komik']);
    }

    /** @test */
    public function user_can_delete_category()
    {
        $user = User::factory()->create();
        $category = Category::factory()->create();

        $response = $this->actingAs($user)->delete("/categories/{$category->id}");

        $response->assertStatus(302);
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
