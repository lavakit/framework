<?php

use Illuminate\Contracts\Translation\Translator;

if (!function_exists('themes')) {
    /**
     * Generate an asset path for the theme.
     *
     * @param string $path
     * @param bool   $secure
     * @return string
     */
    function themes($path, $secure = null)
    {
        return ThemeFrontend::assets($path, $secure);
    }
}

if (!function_exists('lang')) {
    /**
     * Get lang content from current theme.
     *
     * @param $fallback
     * @param  bool $frontend
     * @return Translator|string
     */
    function lang($fallback, $frontend = true)
    {
        if ($frontend) {
            return ThemeFrontend::lang($fallback);
        }

        return ThemeBackend::lang($fallback);
    }
}

if (!function_exists('backendAsset')) {
    /**
     * @param $path
     * @return string
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    function backendAsset($path)
    {
        return asset(ASSET_BACKEND . $path);
    }
}

if (!function_exists('frontendAsset')) {
    /**
     * @param $path
     * @return string
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    function frontendAsset($path)
    {
        return asset(ASSET_FRONTEND . $path);
    }
}
