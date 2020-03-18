<?php

if (!defined('ASSET_FRONTEND')) {
    define('ASSET_FRONTEND', '/themes/frontend/' . env('FRONTEND_DEFAULT', 'default') . '/assets/');
}

if (!defined('FRONTEND_VENDOR')) {
    define('FRONTEND_VENDOR', ASSET_FRONTEND . 'vendor/');
}

if (!defined('ASSET_BACKEND')) {
    define('ASSET_BACKEND', '/themes/backend/' . env('BACKEND_DEFAULT', 'lavatheme') . '/assets/');
}

if (!defined('BACKEND_VENDOR')) {
    define('BACKEND_VENDOR', ASSET_BACKEND . 'vendor/');
}
