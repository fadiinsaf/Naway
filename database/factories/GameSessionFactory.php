<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\GameSession;
use App\Models\User;

class GameSessionFactory extends Factory
{
    protected $model = GameSession::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'score' => $this->faker->numberBetween(0, 100),
            'current_level' => $this->faker->numberBetween(1, 10),
            'started_at' => $this->faker->dateTimeThisMonth(),
            'ended_at' => $this->faker->dateTimeThisMonth(),
        ];
    }
}
