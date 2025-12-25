<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Women in FinTech: ' . $this->faker->words(3, true),
            'event_date' => $this->faker->dateTimeBetween('+3 days', '+6 months'),
            'description' => $this->faker->paragraphs(3, true),
        ];
    }
}
