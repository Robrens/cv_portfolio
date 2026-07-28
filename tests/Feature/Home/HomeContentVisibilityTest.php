<?php

namespace Tests\Feature\Home;

use App\Models\Experience;
use App\Models\Profile;
use App\Models\ProfileStat;
use App\Models\Skill;
use App\Models\SkillCategory;
use App\Models\SocialLink;
use App\Models\WorkMethod;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeContentVisibilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_displays_only_active_content(): void
    {
        $profile = Profile::factory()->create();
        $category = SkillCategory::factory()->create();

        ProfileStat::factory()->for($profile)->create(['label' => 'Indicateur visible']);
        ProfileStat::factory()->for($profile)->inactive()->create(['label' => 'Indicateur masqué']);
        Skill::factory()->for($category, 'category')->create(['name' => 'Laravel']);
        Skill::factory()->for($category, 'category')->inactive()->create(['name' => 'Compétence masquée']);
        SkillCategory::factory()->inactive()->create(['name' => 'Catégorie masquée']);
        WorkMethod::factory()->create(['title' => 'Comprendre']);
        WorkMethod::factory()->inactive()->create(['title' => 'Méthode masquée']);
        SocialLink::factory()->create(['name' => 'GitHub']);
        SocialLink::factory()->inactive()->create(['name' => 'Réseau masqué']);
        Experience::factory()->create(['job_title' => 'Expérience visible']);
        Experience::factory()->inactive()->create(['job_title' => 'Expérience masquée']);

        $this->get(route('home'))
            ->assertOk()
            ->assertSeeText('Indicateur visible')
            ->assertSeeText('Laravel')
            ->assertSeeText('Comprendre')
            ->assertSeeText('GitHub')
            ->assertSeeText('Expérience visible')
            ->assertDontSeeText('Indicateur masqué')
            ->assertDontSeeText('Compétence masquée')
            ->assertDontSeeText('Catégorie masquée')
            ->assertDontSeeText('Méthode masquée')
            ->assertDontSeeText('Réseau masqué')
            ->assertDontSeeText('Expérience masquée');
    }

    public function test_home_page_respects_configured_order(): void
    {
        $profile = Profile::factory()->create();

        ProfileStat::factory()->for($profile)->create([
            'label' => 'Second indicateur',
            'sort_order' => 20,
        ]);
        ProfileStat::factory()->for($profile)->create([
            'label' => 'Premier indicateur',
            'sort_order' => 10,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSeeTextInOrder([
                'Premier indicateur',
                'Second indicateur',
            ]);
    }
}
