<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Comment;
use App\Models\User;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph,
            'user_id' => User::factory(),
            'entity_id' => 1, // To be overridden
            'entity_type' => 'App\\Models\\Artist', // To be overridden
        ];
    }
}
