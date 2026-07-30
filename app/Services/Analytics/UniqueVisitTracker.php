<?php

namespace App\Services\Analytics;

use Carbon\CarbonImmutable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class UniqueVisitTracker
{
  public function record(Request $request): bool
  {
    if (! config('analytics.enabled')) {
      return false;
    }

    $hashKey = config('analytics.hash_key');

    if (! is_string($hashKey) || $hashKey === '') {
      return false;
    }

    $networkPrefix = $this->networkPrefix($request->ip());

    if ($networkPrefix === null) {
      return false;
    }

    $now = CarbonImmutable::now(
      config('analytics.timezone', 'Europe/Paris'),
    );

    $visitedOn = $now->toDateString();

    $fingerprint = hash_hmac(
      'sha256',
      $visitedOn . '|' . $networkPrefix,
      $hashKey,
    );

    try {
      return DB::transaction(function () use (
        $visitedOn,
        $fingerprint,
        $now,
      ): bool {
        $inserted = DB::table('daily_visitors')->insertOrIgnore([
          'visited_on' => $visitedOn,
          'fingerprint' => $fingerprint,
          'created_at' => $now,
          'updated_at' => $now,
        ]);

        if ($inserted === 0) {
          return false;
        }

        DB::table('daily_visit_statistics')->insertOrIgnore([
          'visited_on' => $visitedOn,
          'unique_visitors' => 0,
          'created_at' => $now,
          'updated_at' => $now,
        ]);

        DB::table('daily_visit_statistics')
          ->where('visited_on', $visitedOn)
          ->increment(
            'unique_visitors',
            1,
            ['updated_at' => $now],
          );

        return true;
      });
    } catch (Throwable $exception) {
      report($exception);

      return false;
    }
  }

  private function networkPrefix(?string $ipAddress): ?string
  {
    if (
      $ipAddress === null
      || filter_var($ipAddress, FILTER_VALIDATE_IP) === false
    ) {
      return null;
    }

    if (filter_var($ipAddress, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
      $octets = explode('.', $ipAddress);

      return sprintf(
        'ipv4:%s.%s.%s.0/24',
        $octets[0],
        $octets[1],
        $octets[2],
      );
    }

    $binaryAddress = inet_pton($ipAddress);

    if ($binaryAddress === false) {
      return null;
    }

    return 'ipv6:' . bin2hex(substr($binaryAddress, 0, 6)) . '/48';
  }
}
