<?php

use Illuminate\Support\Facades\Schedule;


Schedule::command('analytics:purge-fingerprints')
    ->dailyAt('02:15')
    ->timezone(config('analytics.timezone', 'Europe/Paris'))
    ->withoutOverlapping();
