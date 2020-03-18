<?php

namespace Lavakit\Theme\Managers\Themes;

use Illuminate\Config\Repository;
use Illuminate\Container\Container;
use Illuminate\Contracts\Translation\Translator;
use Illuminate\View\ViewFinderInterface;
use Lavakit\Theme\Contracts\Themes\Frontend as FrontendContract;

/**
 * Class Frontend
 * @package Lavakit\Theme\Managers\Themes
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com
 */
class Frontend extends ThemeAbstract implements FrontendContract
{
    /**
     * Frontend constructor.
     * @param Container $app
     * @param ViewFinderInterface $finder
     * @param Repository $config
     * @param Translator $lang
     */
    public function __construct(Container $app, ViewFinderInterface $finder, Repository $config, Translator $lang)
    {
        $this->config   = $config;
        $this->app      = $app;
        $this->finder   = $finder;
        $this->lang     = $lang;
        $this->basePath = $this->config['theme.theme.frontend_path'];

        $this->scanThemes();
    }
}
