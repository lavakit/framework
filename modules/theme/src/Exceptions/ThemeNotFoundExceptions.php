<?php

namespace Lavakit\Theme\Exceptions;

/**
 * Class ThemeNotFoundExceptions
 * @package Lavakit\Theme\Exceptions
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class ThemeNotFoundExceptions extends \Exception
{
    public function __construct($themeName)
    {
        $name = config('theme.theme.config.name');

        parent::__construct("Theme [ $themeName ] not found! Maybe you're missing a " . $name . ' file.');
    }
}
