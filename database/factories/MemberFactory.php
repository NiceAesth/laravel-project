<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name('female'),
            'email' => $this->faker->unique()->safeEmail(),
            'profession' => $this->faker->randomElement([
                'Software Developer',
                'Product Manager',
                'Data Analyst',
                'UX Designer',
                'FinTech Consultant'
            ]),
            'company' => $this->faker->optional()->company(),
            'linkedin_url' => $this->faker->optional()->url(),
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }
}
