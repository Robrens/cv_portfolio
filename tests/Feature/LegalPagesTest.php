<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LegalPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Profile::factory()->create([
            'hero_title_before' => 'Titre du hero absent des pages légales',
        ]);
    }

    public function test_legal_notices_page_is_available(): void
    {
        $this->get(route('legal.mentions'))
            ->assertOk()
            ->assertSeeText('Mentions légales')
            ->assertDontSeeText('Titre du hero absent des pages légales');
    }

    public function test_privacy_policy_page_is_available(): void
    {
        $this->get(route('legal.privacy'))
            ->assertOk()
            ->assertSeeText('Politique de confidentialité')
            ->assertDontSeeText('Titre du hero absent des pages légales');
    }
}
