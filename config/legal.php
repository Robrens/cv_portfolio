<?php

return [
    'publisher' => [
        'name' => env('LEGAL_PUBLISHER_NAME'),
        'email' => env('LEGAL_CONTACT_EMAIL'),
    ],

    'host' => [
        'name' => env('LEGAL_HOST_NAME'),
        'address' => env('LEGAL_HOST_ADDRESS'),
        'phone' => env('LEGAL_HOST_PHONE'),
        'website' => env('LEGAL_HOST_WEBSITE'),
    ],

    'retention' => [
        'server_logs_days' => (int) env(
            'LEGAL_SERVER_LOG_RETENTION_DAYS',
            30,
        ),
        'contact_requests_months' => (int) env(
            'LEGAL_CONTACT_RETENTION_MONTHS',
            6,
        ),
    ],
];
