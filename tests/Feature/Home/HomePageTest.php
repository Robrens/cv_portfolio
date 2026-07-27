<?php

namespace Tests\Feature\Home;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_returns_not_found_without_profile(): void
    {
        $this->get(route('home'))->assertNotFound();
    }

    public function test_home_page_displays_the_profile(): void
    {
        $profile = Profile::factory()->create();

        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText($profile->hero_title_before);
    }
}
