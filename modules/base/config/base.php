<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Version & Author
    |--------------------------------------------------------------------------
    */
    'version' => env('VERSION', 'v1.0'),
    'crafted' => env('APP_CRAFTED', 'Lavakit'),

    /*
    |--------------------------------------------------------------------------
    | App name
    |--------------------------------------------------------------------------
    */
    'app_name' => env('APP_NAME', 'Lavakit'),

    /*
    |--------------------------------------------------------------------------
    | These are the core modules that should NOT be disabled
    | under any circumstance
    |--------------------------------------------------------------------------
    */
    'core-modules' => [
        'base',
        'dashboard',
        'theme',
    ],

    /*
    |--------------------------------------------------------------------------
    | The prefix that'll be used for the administration
    |--------------------------------------------------------------------------
    */
    'admin-prefix' => env('APP_ADMIN_PREFIX', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    | You can customise the Middleware that should be loaded.
    | The localizationRedirect middleware is automatically loaded for both
    | Backend and Frontend routes.
    */
    'middleware' => [
        'backend' => [
            //'auth',
            //'SessionTimeout'
        ],
        'frontend' => [
        ],
        'api' => [
            'api',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Check if Lavakit was installed
     |--------------------------------------------------------------------------
     */
    'is_installed' => env('APP_INSTALLED', false),
];
