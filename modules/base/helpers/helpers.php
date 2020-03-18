<?php

use Illuminate\Config\Repository;
use Lavakit\Base\Facades\TitleFacade;

if (!function_exists('crafted')) {
    /**
     * @return Repository|mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    function crafted()
    {
        return config('base.base.crafted');
    }
}

if (!function_exists('pathModule')) {
    /**
     * @return string
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    function pathModule()
    {
        return base_path('vendor/lavakit/framework/modules/');
    }
}

if (!function_exists('locale')) {
     /**
     *  Get Locale of App
     * @param null $locale
     * @return string
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    function locale($locale = null)
    {
        if (is_null($locale)) {
            return app()->getLocale();
        }

        app()->setLocale($locale);

        return app()->getLocale();
    }
}

if (!function_exists('getSupportedLocales')) {

    /**
     * Return an array of all supported Locales.
     *
     * @return array
     */
    function getSupportedLocales()
    {
        return LaravelLocalization::getSupportedLocales();
    }
}

if (!function_exists('title')) {
    /**
     *  @return \Lavakit\Base\Supports\Title
     */
    function title()
    {
        return TitleFacade::getFacadeRoot();
    }
}