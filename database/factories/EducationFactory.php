<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->generateEducation(),
            'started_at' => now()->subYears(rand(4, 6)),
            'completed_at' => now()->subYears(rand(3, 5)),
        ];
    }

    protected function generateEducation(): string
    {
        return self::educations()[array_rand(self::educations())];
    }

    protected static function educations(): array
    {
        return [
            'High School',
            'Associate Degree',
            'Bachelor\'s Degree',
            'Master\'s Degree',
            'Doctorate',
            'Post-Doctorate',
        ];
    }
}
