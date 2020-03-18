<?php

namespace Lavakit\Theme\Managers\Themes;

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\View\ViewFinderInterface;
use Noodlehaus\Config;
use Lavakit\Theme\Contracts\Themes\ThemeContract;
use Lavakit\Theme\Exceptions\ThemeNotFoundExceptions;

/**
 * Class ThemeAbstract
 * @package Lavakit\Theme\Managers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com
 */
abstract class ThemeAbstract implements ThemeContract
{
    /**
     * Theme Root Path
     *
     * @var String
     */
    protected $basePath;

    /**
     * All theme information
     *
     * @var $themes
     */
    protected $themes;

    /**
     * Blade View Finder
     *
     * @var ViewFinderInterface
     */
    protected $finder;

    /**
     * Application Container
     *
     * @var Container
     */
    protected $app;

    /**
     * Translator
     *
     * @var Translator
     */
    protected $lang;

    /**
     * Config
     *
     * @var Repository
     */
    protected $config;

    /**
     * Current Active Theme
     *
     * @var string
     */
    protected $activeTheme = null;

    /**
     * Set Current theme
     *
     * @param $theme
     * @throws ThemeNotFoundExceptions
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function set($theme)
    {
        if (!$this->has($theme)) {
            throw new ThemeNotFoundExceptions($theme);
        }

        $this->loadTheme($theme);
        $this->activeTheme = $theme;
    }

    /**
     * Check if theme exists
     *
     * @param $theme
     * @return bool
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function has($theme)
    {
        return array_key_exists($theme, $this->themes);
    }

    /**
     * Get particular theme all information
     *
     * @param $themeName
     * @return null
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function getThemeInfo($themeName)
    {
        return isset($this->themes[$themeName]) ? $this->themes[$themeName] : null;
    }

    /**
     * Returns current theme or particular theme information
     *
     * @param null $theme
     * @param bool $collection
     * @return mixed
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    public function get($theme = null, $collection = false)
    {
        if (is_null($theme) || !$this->has($theme)) {
            return !$collection ? $this->themes[$this->activeTheme]->all() : $this->themes[$this->activeTheme];
        }

        return !$collection ? $this->themes[$theme]->all() : $this->themes[$theme];
    }

    /**
     * Get current active theme name only or theme info collection
     *
     * @param bool $collection
     * @return mixed|null|string
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    public function current($collection = false)
    {
        return !$collection ? $this->activeTheme : $this->getThemeInfo($this->activeTheme);
    }

    /**
     * Get all theme information
     *
     * @return mixed
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    public function all()
    {
        return $this->themes;
    }

    /**
     * Return all name of Theme
     *
     * @return mixed
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    public function allThemeName()
    {
        $themes = $this->all();

        return array_keys($themes);
    }


    /**
     * Find asset file for theme asset
     *
     * @param $path
     * @param null $secure
     * @return bool|mixed
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function assets($path, $secure = null)
    {
        $splitThemeAndPath = explode(':', $path);
        if (count($splitThemeAndPath) > 1) {
            if (is_null($splitThemeAndPath[1])) {
                return false;
            }
            $themeName = $splitThemeAndPath[0];
            $path = $splitThemeAndPath[1];
        } else {
            $themeName = $this->activeTheme;
            $path = $splitThemeAndPath[0];
        }

        $themeInfo =  $this->getThemeInfo($themeName);

        if ($this->config['theme.theme.symlink']) {
            $themePath = 'Themes/' . $themeName;
        } else {
            $themePath = strtolower(str_replace(base_path(), '', $themeInfo->get('path')));
        }

        $assetPath = $this->config['theme.theme.folders.assets'];
        $fullPath = $themePath . DS . $assetPath . DS . $path;
        if (!file_exists($fullPath) && $themeInfo->has('parent') && !empty($themeInfo->get('parent'))) {
            $getPath = $this->getThemeInfo($themeInfo->get('parent'))->get('path');
            $themePath = str_replace(base_path() . DS, '', $getPath) . DS;
            $fullPath = $themePath.$assetPath.$path;

            return $this->app['url']->asset($fullPath, $secure);
        }

        return $this->app['url']->asset($fullPath, $secure);
    }

    /**
     * Get lang content from current theme
     *
     * @param $fallback
     * @return array|Translator|mixed|null|string
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com
     */
    public function lang($fallback)
    {
        $splitLang = explode('::', $fallback);

        if (count($splitLang) > 1) {
            if (is_null($splitLang[0])) {
                $fallback = $splitLang[1];
            } else {
                $fallback = $splitLang[0].'::'.$splitLang[1];
            }
        } else {
            $fallback = $this->current().'::'.$splitLang[0];
            if (!$this->lang->has($fallback)) {
                $fallback = $this->getThemeInfo($this->current())->get('parent').'::'.$splitLang[0];
            }
        }

        return trans($fallback);
    }

    /**
     * Scan for all available themes
     *
     * @return void
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function scanThemes()
    {
        $themeDirectories = glob($this->basePath.'/*', GLOB_ONLYDIR);
        $themes = [];
        foreach ($themeDirectories as $themePath) {
            $themeConfigPath = $themePath. DIRECTORY_SEPARATOR . $this->config['theme.theme.config.name'];
            $themeChangelogPath = $themePath.DIRECTORY_SEPARATOR.$this->config['theme.theme.config.changelog'];

            if (file_exists($themeConfigPath)) {
                $themeConfig = Config::load($themeConfigPath);
                $themeConfig['changelog'] = Config::load($themeChangelogPath)->all();
                $themeConfig['path'] = $themePath;

                if ($themeConfig->has('name')) {
                    $themes[$themeConfig->get('name')] = $themeConfig;
                }
            }
        }
        $this->themes = $themes;
    }

    /**
     * Map view map for particular theme
     *
     * @param string $theme
     * @return void
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function loadTheme($theme)
    {
        if (is_null($theme)) {
            return;
        }

        $themeInfo = $this->getThemeInfo($theme);
        if (is_null($themeInfo)) {
            return;
        }

        /** @var Config $themeInfo */
        $this->loadTheme($themeInfo->get('parent'));
        $viewPath = $themeInfo->get('path') . DS . $this->config['theme.theme.folders.views'];
        $langPath = $themeInfo->get('path') . DS . $this->config['theme.theme.folders.lang'];

        $this->finder->prependLocation($themeInfo->get('path'));
        $this->finder->prependLocation($viewPath);
        $this->finder->prependNamespace($themeInfo->get('name'), $viewPath);
        if ($themeInfo->has('type') && !empty($themeInfo->get('type'))) {
            $this->finder->prependNamespace($themeInfo->get('type'), $viewPath);
        }
        $this->lang->addNamespace($themeInfo->get('name'), $langPath);
    }
}
