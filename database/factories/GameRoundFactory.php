<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\GameRound;
use App\Models\GameSession;
use App\Models\Maqam;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GameRound>
 */
class GameRoundFactory extends Factory
{
    protected $model = GameRound::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_id' => GameSession::factory(),
            'maqam_id' => Maqam::factory(),
            'audio_clip' => null,
            'selected_answer' => $this->faker->word,
            'is_correct' => $this->faker->boolean(50),
        ];
    }
}
