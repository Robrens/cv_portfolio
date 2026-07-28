<?php

namespace Tests\Feature\Home;

use App\Models\Experience;
use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExperienceModalTest extends TestCase
{
    use RefreshDatabase;

    public function test_modal_is_only_rendered_for_experience_with_details(): void
    {
        Profile::factory()->create();

        $withDetails = Experience::factory()->withDetails()->create();
        $withoutDetails = Experience::factory()->create([
            'job_title' => 'Expérience sans détails',
        ]);

        $response = $this->get(route('home'));

        $response
            ->assertOk()
            ->assertSee('id="experience-'.$withDetails->id.'"', false)
            ->assertSeeText('Description détaillée de cette expérience.')
            ->assertSeeText('Maintenir les applications')
            ->assertDontSee('id="experience-'.$withoutDetails->id.'"', false);

        $this->assertSame(
            1,
            substr_count($response->getContent(), 'Voir le détail'),
        );
    }
}
