<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuccessStoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'story' => $this->faker->paragraphs(4, true),
            'member_id' => Member::factory(),
        ];
    }
}
