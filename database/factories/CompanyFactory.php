<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'location' => fake()->address(),
            'description' => fake()->text(),
            'company_logo_url' => fake()->imageUrl(),
            'founded_at' => now()->subYears(rand(2, 10))->subMonths(rand(0, 12)),
        ];
    }
}
