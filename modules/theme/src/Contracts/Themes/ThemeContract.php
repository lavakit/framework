<?php

namespace Lavakit\Theme\Contracts\Themes;

/**
 * Interface ThemeContract
 * @package Lavakit\Theme\Contracts\Themes
 *
 * @copyright 2020 Lavakit Group
 *@author tqhoa <tqhoa8th@gmail.com>
 */
interface ThemeContract
{
    /**
     * Set Current theme
     *
     * @param $theme
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function set($theme);

    /**
     * Check if theme exists
     *
     * @param $theme
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function has($theme);

    /**
     * Get particular theme all information
     *
     * @param $name
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function getThemeInfo($name);

    /**
     * Returns current theme or particular theme information
     *
     * @param null $theme
     * @param bool $collection
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function get($theme = null, $collection = false);

    /**
     * Get current active theme name only or theme info collection
     *
     * @param bool $collection
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function current($collection = false);

    /**
     * Get all theme information
     *
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function all();

    /**
     * Return all name of Theme
     *
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function allThemeName();

    /**
     * Find asset file for theme asset
     *
     * @param $path
     * @param null $secure
     * @return mixed
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function assets($path, $secure = null);

    /**
     * Get lang content from current theme
     *
     * @param $fallback
     * @return mixed
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function lang($fallback);
}