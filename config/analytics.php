<?php

return [
    'enabled' => (bool) env('ANALYTICS_ENABLED', true),

    /*
    |--------------------------------------------------------------------------
    | Hash key
    |--------------------------------------------------------------------------
    |
    */
    'hash_key' => env('ANALYTICS_HASH_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Statistics timezone
    |--------------------------------------------------------------------------
    */
    'timezone' => env('ANALYTICS_TIMEZONE', 'Europe/Paris'),

    /*
    |--------------------------------------------------------------------------
    | Preservation of temporary fingerprints
    |--------------------------------------------------------------------------
    */
    'fingerprint_retention_hours' => (int) env(
        'ANALYTICS_FINGERPRINT_RETENTION_HOURS',
        48,
    ),
];
