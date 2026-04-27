<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Rhythm;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rhythm>
 */
class RhythmFactory extends Factory
{
    protected $model = Rhythm::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' Rhythm',
            'description' => $this->faker->sentence,
            'audio_url' => null,
            'score_url' => null,
            'is_published' => $this->faker->boolean(80),
        ];
    }
}
