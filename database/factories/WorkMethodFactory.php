<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class WorkMethodFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => 'Comprendre',
            'description' => 'Analyser le besoin.',
            'sort_order' => 0,
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn () => ['is_active' => false]);
    }
}
