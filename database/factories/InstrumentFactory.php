<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Instrument;

class InstrumentFactory extends Factory
{
    protected $model = Instrument::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'type' => $this->faker->word,
            'origin' => $this->faker->country,
            'historical_description' => $this->faker->paragraphs(2, true),
            'image' => null,
            'is_published' => $this->faker->boolean(80),
        ];
    }
}
