<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition()
    {
        return [
            'title'       => $this->faker->sentence(3),
            'author'      => $this->faker->name,
            'year'        => $this->faker->year,
            'category_id' => Category::factory(), // otomatis buat category
        ];
    }
}
