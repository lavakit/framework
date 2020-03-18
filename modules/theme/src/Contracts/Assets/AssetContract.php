<?php

namespace Lavakit\Theme\Contracts\Assets;

/**
 * Interface AssetContract
 * @package Lavakit\Theme\Contracts\Assets
 *
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
interface AssetContract
{
    /**
     * Add javascript  to current module
     *
     * @param $assets
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function addJavascript($assets);

    /**
     * @param $assets
     * @param string $location
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function addJavascriptDirectly($assets, $location = 'bottom');

    /**
     * Add Css to current module
     *
     * @param $assets
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function addStylesheets($assets);

    /**
     * @param $assets
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function addStylesheetsDirectly($assets);

    /**
     * Add Module to current module
     *
     * @param $modules
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function addAppModule($modules);

    /**
     * Remove Css to current module
     *
     * @param $assets
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function removeStylesheets($assets);

    /**
     * Remove Javascript to current module
     *
     * @param $assets
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function removeJavascript($assets);

    /**
     * Get All Javascript in current module
     *
     * @param null $location
     * @param bool $version
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function getJavascript($location = null, $version = true);

    /**
     * Get All CSS in current module
     *
     * @param array $lastModules
     * @param bool $version
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function getStylesheets($lastModules = [], $version = true);

    /**
     * Get all modules in current module
     *
     * @param bool $version
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function getAppModules($version = true);
}
