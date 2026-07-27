<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'job_title' => 'Développeur web',
            'company_name' => 'Entreprise',
            'start_year' => 2024,
            'summary' => 'Résumé de l’expérience.',
            'sort_order' => 0,
            'is_active' => true,
        ];
    }

    public function inactive(): static
    {
        return $this->state(fn() => ['is_active' => false]);
    }

    public function withDetails(): static
    {
        return $this->state(fn() => [
            'details' => 'Description détaillée de cette expérience.',
            'responsibilities' => ['Maintenir les applications'],
            'technologies' => ['Laravel', 'PostgreSQL'],
        ]);
    }
}
