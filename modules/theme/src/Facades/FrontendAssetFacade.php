<?php

namespace Lavakit\Theme\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Theme\Managers\Assets\FrontendAsset;

/**
 * Class FrontendAssetFacade
 * @package Lavakit\Theme\Facades
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class FrontendAssetFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FrontendAsset::class;
    }
}
