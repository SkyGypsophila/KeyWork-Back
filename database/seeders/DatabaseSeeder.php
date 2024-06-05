<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Offer;
use App\Models\Skill;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()
            ->has(
                Offer::factory()
                    ->count(10)
            )->has(
                Skill::factory()
                    ->count(4)
            )->has(
                Education::factory()
                    ->count(2)
            )->has(
                Experience::factory()
                    ->count(3)
            )->has(
                Company::factory()->count(1)
            )->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);

        User::factory()
            ->has(
                Offer::factory()
                    ->count(6)
            )->has(
                Skill::factory()
                    ->count(3)
            )->has(
                Education::factory()
                    ->count(2)
            )->has(
                Experience::factory()
                    ->count(2)
            )->has(
                Company::factory()->count(1)
            )->create();
    }
}
