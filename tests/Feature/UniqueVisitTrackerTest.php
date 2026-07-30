<?php

namespace Tests\Feature;

use App\Services\Analytics\UniqueVisitTracker;
use Carbon\CarbonImmutable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UniqueVisitTrackerTest extends TestCase
{
  use RefreshDatabase;

  const TIME_ZONE="Europe/Paris";
  const EXEMPLE_DATE="2026-07-30";
  const REQUESTED_IP="203.0.113.10";

  protected function setUp(): void
  {
    parent::setUp();

    config()->set('analytics.enabled', true);
    config()->set(
      'analytics.hash_key',
      'test-only-analytics-key-that-is-not-used-in-production',
    );
    config()->set('analytics.timezone', self::TIME_ZONE);

    CarbonImmutable::setTestNow(
      CarbonImmutable::parse(
        '2026-07-30 12:00:00',
        self::TIME_ZONE,
      ),
    );
  }

  protected function tearDown(): void
  {
    CarbonImmutable::setTestNow();

    parent::tearDown();
  }

  public function test_same_network_is_counted_once_during_same_day(): void
  {
    $tracker = app(UniqueVisitTracker::class);

    $firstRequest = $this->requestFromIp(self::REQUESTED_IP);
    $secondRequest = $this->requestFromIp('203.0.113.42');

    $this->assertTrue($tracker->record($firstRequest));
    $this->assertFalse($tracker->record($secondRequest));

    $this->assertDatabaseCount('daily_visitors', 1);

    $this->assertDatabaseHas('daily_visit_statistics', [
      'visited_on' => self::EXEMPLE_DATE,
      'unique_visitors' => 1,
    ]);
  }

  public function test_different_networks_are_counted_separately(): void
  {
    $tracker = app(UniqueVisitTracker::class);

    $tracker->record($this->requestFromIp(self::REQUESTED_IP));
    $tracker->record($this->requestFromIp('198.51.100.20'));

    $this->assertDatabaseCount('daily_visitors', 2);

    $this->assertDatabaseHas('daily_visit_statistics', [
      'visited_on' => self::EXEMPLE_DATE,
      'unique_visitors' => 2,
    ]);
  }

  public function test_fingerprint_changes_each_day(): void
  {
    $tracker = app(UniqueVisitTracker::class);
    $request = $this->requestFromIp(self::REQUESTED_IP);

    $tracker->record($request);

    CarbonImmutable::setTestNow(
      CarbonImmutable::parse(
        '2026-07-31 12:00:00',
        self::TIME_ZONE,
      ),
    );

    $tracker->record($request);

    $this->assertDatabaseCount('daily_visitors', 2);

    $this->assertDatabaseHas('daily_visit_statistics', [
      'visited_on' => self::EXEMPLE_DATE,
      'unique_visitors' => 1,
    ]);

    $this->assertDatabaseHas('daily_visit_statistics', [
      'visited_on' => '2026-07-31',
      'unique_visitors' => 1,
    ]);
  }

  public function test_raw_ip_address_is_never_stored(): void
  {
    $tracker = app(UniqueVisitTracker::class);

    $tracker->record(
      $this->requestFromIp(self::REQUESTED_IP),
    );

    $storedValues = DB::table('daily_visitors')
      ->first();

    $this->assertNotNull($storedValues);
    $this->assertNotSame(
      self::REQUESTED_IP,
      $storedValues->fingerprint,
    );
    $this->assertSame(64, strlen($storedValues->fingerprint));
  }

  public function test_tracking_is_disabled_without_hash_key(): void
  {
    config()->set('analytics.hash_key', null);

    $recorded = app(UniqueVisitTracker::class)->record(
      $this->requestFromIp(self::REQUESTED_IP),
    );

    $this->assertFalse($recorded);
    $this->assertDatabaseCount('daily_visitors', 0);
    $this->assertDatabaseCount('daily_visit_statistics', 0);
  }

  private function requestFromIp(string $ipAddress): Request
  {
    return Request::create(
      uri: '/',
      method: 'GET',
      server: [
        'REMOTE_ADDR' => $ipAddress,
      ],
    );
  }
}
