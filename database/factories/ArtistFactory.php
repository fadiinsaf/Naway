<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Artist;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    protected $model = Artist::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'nationality' => $this->faker->country,
            'city' => $this->faker->city,
            'birth_day' => $this->faker->date('Y-m-d', '-30 years'),
            'date_of_death' => $this->faker->optional()->date('Y-m-d', 'now'),
            'years_active' => $this->faker->numberBetween(1, 50),
            'songs' => $this->faker->numberBetween(0, 200),
            'films' => $this->faker->optional()->numberBetween(1, 10),
            'biography' => $this->faker->paragraphs(3, true),
            'image' => null, // Or a faker image URL if needed
            'is_published' => $this->faker->boolean(80), // 80% chance true
        ];
    }
}
