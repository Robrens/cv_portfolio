<?php

namespace Tests\Feature;

use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PurgeAudienceFingerprintsTest extends TestCase
{
    use RefreshDatabase;

    const EXEMPLE_DATE = '2026-07-27';

    protected function tearDown(): void
    {
        CarbonImmutable::setTestNow();

        parent::tearDown();
    }

    public function test_old_fingerprints_are_deleted_without_deleting_statistics(): void
    {
        config()->set('analytics.timezone', 'Europe/Paris');
        config()->set('analytics.fingerprint_retention_hours', 48);

        CarbonImmutable::setTestNow(
            CarbonImmutable::parse(
                '2026-07-30 12:00:00',
                'Europe/Paris',
            ),
        );

        DB::table('daily_visitors')->insert([
            [
                'visited_on' => self::EXEMPLE_DATE,
                'fingerprint' => str_repeat('a', 64),
                'created_at' => now()->subHours(72),
                'updated_at' => now()->subHours(72),
            ],
            [
                'visited_on' => '2026-07-30',
                'fingerprint' => str_repeat('b', 64),
                'created_at' => now()->subHour(),
                'updated_at' => now()->subHour(),
            ],
        ]);

        DB::table('daily_visit_statistics')->insert([
            'visited_on' => self::EXEMPLE_DATE,
            'unique_visitors' => 12,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $this->artisan('analytics:purge-fingerprints')
            ->assertSuccessful();

        $this->assertDatabaseMissing('daily_visitors', [
            'fingerprint' => str_repeat('a', 64),
        ]);

        $this->assertDatabaseHas('daily_visitors', [
            'fingerprint' => str_repeat('b', 64),
        ]);

        $this->assertDatabaseHas('daily_visit_statistics', [
            'visited_on' => self::EXEMPLE_DATE,
            'unique_visitors' => 12,
        ]);
    }
}
