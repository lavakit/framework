<?php

return [
    'offline' => env('OFFLINE', true),

    'javascript' => [
        'manifest',
        'vendor',
        'lavakit',
    ],

    'stylesheets' => [
        'lavakit'
    ],

    'resources' => [
        'javascript' => [
            'manifest' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' => ASSET_BACKEND . 'js/manifest.js'
                ]
            ],

            'vendor' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' => ASSET_BACKEND . 'js/vendor.js'
                ]
            ],

            'lavakit' => [
                'use_cdn' => false,
                'location' => 'bottom',
                'src' => [
                    'local' => ASSET_BACKEND . 'js/lavakit.js'
                ]
            ]
        ],

        'stylesheets' => [
            'lavakit' => [
                'use_cdn' => false,
                'location' => 'top',
                'src' => [
                    'local' => ASSET_BACKEND . 'css/style.css'
                ]
            ],
        ]
    ]
];
