<?php

namespace Lavakit\Theme\Providers;

use Illuminate\Support\ServiceProvider;
use Lavakit\Base\Traits\CanRegisterFacadeAliases;
use Lavakit\Theme\Facades\BackendAssetFacade;
use Lavakit\Theme\Facades\FrontendAssetFacade;

/**
 * Class AssetServiceProvider
 * @package Lavakit\Theme\Providers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class AssetServiceProvider extends ServiceProvider
{
    use CanRegisterFacadeAliases;

    /**
     * @var array $facadeAlias
     */
    protected $facadeAlias = array(
        'BackendAsset' => BackendAssetFacade::class,
        'FrontendAsset' => FrontendAssetFacade::class
    );

    /**
     * Bootstrap any application services.
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacadeAlias($this->facadeAlias);
    }
}
