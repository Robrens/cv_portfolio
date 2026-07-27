<?php

namespace Tests\Unit\Models;

use App\Models\Experience;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ExperienceTest extends TestCase
{
    public function test_period_label_formats_a_completed_experience(): void
    {
        $experience = new Experience([
            'start_month' => 4,
            'start_year' => 2023,
            'end_month' => 6,
            'end_year' => 2026,
        ]);

        $this->assertSame('Avr. 2023 – Juin 2026', $experience->period_label);
    }

    public function test_period_label_uses_today_for_a_current_experience(): void
    {
        $experience = new Experience([
            'start_month' => 9,
            'start_year' => 2026,
            'is_current' => true,
        ]);

        $this->assertSame('Sept. 2026 – Aujourd’hui', $experience->period_label);
    }

    public function test_period_label_supports_a_year_without_a_month(): void
    {
        $experience = new Experience([
            'start_year' => 2014,
            'end_year' => 2020,
        ]);

        $this->assertSame('2014 – 2020', $experience->period_label);
    }

    public function test_title_label_combines_job_and_company(): void
    {
        $experience = new Experience([
            'job_title' => 'Développeur web',
            'company_name' => 'Yes We Dev',
        ]);

        $this->assertSame(
            'Développeur web • Yes We Dev',
            $experience->title_label,
        );
    }

    #[DataProvider('detailsProvider')]
    public function test_has_details_detects_modal_content(
        array $attributes,
        bool $expected,
    ): void {
        $experience = new Experience($attributes);

        $this->assertSame($expected, $experience->has_details);
    }

    public static function detailsProvider(): array
    {
        return [
            'no detail' => [
                [
                    'details' => null,
                    'responsibilities' => null,
                    'achievements' => null,
                ],
                false,
            ],
            'description' => [
                ['details' => 'Description détaillée'],
                true,
            ],
            'responsibility' => [
                ['responsibilities' => ['Maintenir une application']],
                true,
            ],
            'achievement' => [
                ['achievements' => ['Automatiser un déploiement']],
                true,
            ],
        ];
    }
}
