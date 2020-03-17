<?php

namespace Lavakit\Theme\Managers\Assets;

use Lavakit\Theme\Contracts\Assets\AssetContract;

/**
 * Class BackendAsset
 * @package Lavakit\Theme\Managers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class BackendAsset extends AssetAbstract implements AssetContract
{
    protected $config = 'backend';

    /**
     * AssetManager constructor.
     */
    public function __construct()
    {
        if (config('app.env') == 'production') {
            $this->build = config('base.base.version');
        }

        $this->build = time();
        $this->javascript = config("theme.{$this->config}.javascript");
        $this->stylesheets = config("theme.{$this->config}.stylesheets");
    }

    /**
     * @return mixed|string
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function assetPath()
    {
        return ASSET_BACKEND;
    }
}
