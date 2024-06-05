<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' => fake()->text(),
            'salary' => random_int(2, 100),
            'hours' => random_int(1,6),
            'date' => now()->addHours(rand(5, 7)),
            'requirements' => $this->generateRequirements(),
        ];
    }

    protected function generateRequirements()
    {
        $requirements = [];

        for ($i = 0; $i < rand(2, 5) ; $i++) {
            $requirements[] = fake()->text(10);
        }

        return implode(',', $requirements);
    }
}
