<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_application_returns_a_successful_response(): void
    {
        Profile::query()->create([
            'first_name' => 'Jean-Baptiste',
            'last_name' => 'Baudu',
            'job_title' => 'Développeur web',

            'hero_title_before' => 'Je construis des applications',
            'hero_title_primary_highlight' => 'utiles',
            'hero_title_secondary_highlight' => 'fiables',
            'hero_description' => 'Description utilisée pour le test.',

            'about_title' => 'Un profil hybride',
            'about_description' => 'Présentation utilisée pour le test.',
        ]);

        $response = $this->get(route('home'));

        $response->assertOk();
    }
}
