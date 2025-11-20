<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    */

    'default' => env('LOG_CHANNEL', 'daily'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    */

    'channels' => [
        'daily' => [
            'driver' => 'daily',
            'path' => env('LOG_PATH', 'storage/logs/alphavel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => env('LOG_DAYS', 7),
        ],

        'single' => [
            'driver' => 'single',
            'path' => env('LOG_PATH', 'storage/logs/alphavel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
        ],

        'stderr' => [
            'driver' => 'stderr',
            'level' => env('LOG_LEVEL', 'debug'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Log Level
    |--------------------------------------------------------------------------
    |
    | Options: emergency, alert, critical, error, warning, notice, info, debug
    |
    */

    'level' => env('LOG_LEVEL', 'debug'),

    /*
    |--------------------------------------------------------------------------
    | Log Format
    |--------------------------------------------------------------------------
    */

    'format' => env('LOG_FORMAT', '[%datetime%] %level_name%: %message% %context%'),
];
