<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Maqam;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maqam>
 */
class MaqamFactory extends Factory
{
    protected $model = Maqam::class;

    public function definition(): array
    {
        return [
            'name' => 'Maqam ' . $this->faker->word,
            'description' => $this->faker->sentence,
            'audio_url' => null,
            'score_url' => null,
            'is_published' => $this->faker->boolean(80),
        ];
    }
}
