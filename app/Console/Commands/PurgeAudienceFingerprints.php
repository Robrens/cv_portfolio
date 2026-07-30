<?php

namespace App\Console\Commands;

use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class PurgeAudienceFingerprints extends Command
{
    protected $signature = 'analytics:purge-fingerprints';

    protected $description = 'Remove temporary audience measurement fingerprints';

    public function handle(): int
    {
        $retentionHours = max(
            1,
            (int) config(
                'analytics.fingerprint_retention_hours',
                48,
            ),
        );

        $threshold = CarbonImmutable::now(
            config('analytics.timezone', 'Europe/Paris'),
        )->subHours($retentionHours);

        $deletedRows = DB::table('daily_visitors')
            ->where('created_at', '<', $threshold)
            ->delete();

        $this->info(
            "{$deletedRows} temporary fingerprint(s) deleted.",
        );

        return self::SUCCESS;
    }
}
