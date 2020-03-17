<?php

namespace Lavakit\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Managers\Assets\BackendAsset;

/**
 * Class BackendAssetFacade
 * @package Lavakit\Theme\Facades
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class BackendAssetFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return BackendAsset::class;
    }
}
