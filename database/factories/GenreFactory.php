<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Genre;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genre>
 */
class GenreFactory extends Factory
{
    protected $model = Genre::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word . ' Genre',
            'description' => $this->faker->paragraph,
            'legendary_artists' => $this->faker->sentence,
            'characteristics' => $this->faker->paragraph,
            'examples' => $this->faker->sentence,
            'examples_audio_url' => null,
            'is_published' => $this->faker->boolean(80),
        ];
    }
}
