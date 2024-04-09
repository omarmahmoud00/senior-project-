<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['Transportation', 'Hospitality', 'Entertainment', 'Events', 'Attractions', 'Services'];

        return [
            'title' => $this->faker->words(3, true),
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 5, 100), // Adjust the range as necessary
            'info' => $this->faker->sentence,
            'type' => $this->faker->randomElement($types),
        ];
    }
}
