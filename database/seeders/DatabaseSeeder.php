<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrow;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password')
        ]);

        Borrow::factory(10)->create();
    }
}
