<?php

namespace Lavakit\Base\Facades;

use Illuminate\Support\Facades\Facade;
use Lavakit\Base\Supports\Title;

/**
 * Class TitleFacade
 * @package Lavakit\Base\Facades
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class TitleFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Title::class;
    }
}
