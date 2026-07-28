<?php

namespace Tests\Feature\Home;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResumeDownloadTest extends TestCase
{
    use RefreshDatabase;

    public function test_resume_link_keeps_a_readable_download_filename(): void
    {
        Profile::factory()->create([
            'resume_path' => 'resumes/mon-cv-source.pdf',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('/storage/resumes/mon-cv-source.pdf', false)
            ->assertSee('download="BAUDU_CV.pdf"', false);
    }
}
