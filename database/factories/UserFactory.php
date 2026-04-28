<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    
    protected static ?string $password;

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

}
