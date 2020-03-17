<?php

return [
    /*
    |-----------------------------------------------------------------------------
    | Default active Theme
    |-----------------------------------------------------------------------------
    |
    | Default active Theme name like as
    | 'active'  =>  'default'
    |
    */
    'active'            =>  env('FRONTEND_DEFAULT', 'default'),
    'active_backend'    =>  env('BACKEND_DEFAULT', 'lavatheme'),

    /*
    |--------------------------------------------------------------------------
    | Themes path
    |--------------------------------------------------------------------------
    |
    | This path used for save the generated theme. This path also will added
    | automatically to list of scanned folders.
    |
    */
    'frontend_path' => base_path('Themes/frontend'),
    'backend_path'  => base_path('Themes/backend'),

    /*
    |--------------------------------------------------------------------------
    | Symbolic link
    |--------------------------------------------------------------------------
    |
    | If you frontend_path and backend_path is not in public folder then symlink must be true
    | otherwise theme assets not working. If your frontend_path and backend_path under public folder
    | then symlink can be false or true as your wish.
    |
    */

    'symlink' => true,

    /*
    |--------------------------------------------------------------------------
    | Theme types where you can set default theme for particular middleware.
    |--------------------------------------------------------------------------
    | 'types'     => [
    |       'enable' => true or false,
    |       'middleware' => [
    |           'middlewareName'      => 'themeName',
    |       ]
    |   ],
    |
    */
    'types'     => [
        'enable'        => true,
        'middleware'    => [
            'frontend' => env('FRONTEND_DEFAULT', 'default'),
            'backend' => env('BACKEND_DEFAULT', 'lavatheme')
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Theme config name and change log file name
    |--------------------------------------------------------------------------
    |
    | Here is the config for theme.json file and changelog
    | for version control status
    |
    */
    'config'     => [
        'name'      => 'theme.json',
        'changelog' => 'changelog.yml',
    ],
    /*
    |--------------------------------------------------------------------------
    | Themes folder structure
    |--------------------------------------------------------------------------
    |
    | Here you may update theme folder structure.
    |
    */
    'folders'    => [
        'assets'    => 'assets',
        'views'     => 'views',
        'lang'      => 'lang',
        'lang/en'   => 'lang/en',
        'css'       => 'assets/css',
        'js'        => 'assets/js',
        'images'    => 'assets/images',
        'layouts'   => 'views/layouts',
    ],
    /*
    |--------------------------------------------------------------------------
    | Theme Stubs
    |--------------------------------------------------------------------------
    |
    | Default theme stubs.
    |
    */
    'stubs'      => [
        'path'  => pathModule() . 'theme/src/Console/stubs',
        'files' => [
            'css'    => 'assets/css/app.css',
            'layout' => 'views/layouts/master.blade.php',
            'page'   => 'views/welcome.blade.php',
            'lang'   => 'lang/en/site.php',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Author theme
    |--------------------------------------------------------------------------
    |
    | Default theme create.
    |
    */
    'author' => 'TQHOA'
];
