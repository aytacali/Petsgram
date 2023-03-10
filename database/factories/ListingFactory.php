<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'animal' => fake()->sentence(),
            'tags' => 'cat, dog, bird',
            'animalName' => fake()->company(),
            'email' => fake()->companyEmail(),
            'location' => fake()->country(),
            'description' => fake()->paragraph(5),

        ];
    }
}
