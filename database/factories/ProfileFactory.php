<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'first_name' => 'Jean-Baptiste',
            'last_name' => 'Baudu',
            'job_title' => 'Développeur web',
            'hero_title_before' => 'Je construis des applications',
            'hero_title_primary_highlight' => 'utiles',
            'hero_title_secondary_highlight' => 'fiables',
            'hero_description' => 'Description utilisée pour le test.',
            'about_title' => 'Un profil hybride',
            'about_description' => 'Présentation utilisée pour le test.',
            'passions_is_active' => false,
        ];
    }
}
