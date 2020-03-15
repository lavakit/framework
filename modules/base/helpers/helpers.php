<?php

use Illuminate\Config\Repository;

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
