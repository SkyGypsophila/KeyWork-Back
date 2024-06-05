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
            'salary' => rand(2, 100),
            'hours' => rand(1,6),
            'date' => now()->addHours(rand(12, 48)),
            'requirements' => $this->generateRequirements(),
        ];
    }

    protected function generateRequirements(): string
    {
        $requirements = [];

        for ($i = 0; $i < rand(2, 5) ; $i++) {
            $requirements[] = fake()->text(10);
        }

        return implode(',', $requirements);
    }
}
