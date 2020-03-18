<?php

namespace Lavakit\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Contracts\Themes\Backend as ThemeBackendContract;

/**
 * Class BackendThemeFacade
 * @package Lavakit\Theme\Facades
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class BackendThemeFacade extends Facade
{
    /**
     * Get the registered name of the component.
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return ThemeBackendContract::class;
    }
}
