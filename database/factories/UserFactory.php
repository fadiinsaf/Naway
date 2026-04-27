<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'role' => 'member', // added a default role to avoid issues
            'speciality' => fake()->randomElement(['Oud', 'Singer', 'Qanun', 'Violin', 'Nay', 'Composer']),
            'country' => fake()->country(),
            'city' => fake()->city(),
        ];
    }

    // removed unverified method because email_verified_at column does not exist
}
