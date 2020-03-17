<?php

namespace Lavakit\Theme\Providers;

use Carbon\Laravel\ServiceProvider;
use Lavakit\Theme\Composers\BackendAssetViewComposer;
use Lavakit\Theme\Composers\FrontendAssetViewComposer;

/**
 * Class ComposerServiceProvider
 * @package Lavakit\Theme\Providers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.master'], FrontendAssetViewComposer::class);
        view()->composer(['layouts.base'], BackendAssetViewComposer::class);
    }
}
