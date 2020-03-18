<?php

namespace Lavakit\Theme\Composers;

use Illuminate\View\View;
use FrontendAsset;

/**
 * Class AssetFrontendViewComposer
 * @package Lavakit\Theme\Composers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class FrontendAssetViewComposer
{

    /**
     * @param View $view
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function compose(View $view)
    {
        $cssFiles = $this->getStylesheet();
        $jsFiles  = $this->getJavascript();

        $view->with(compact('cssFiles'));
        $view->with(compact('jsFiles'));
    }

    /**
     * Get the current Stylesheet
     *
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function getStylesheet()
    {
        return FrontendAsset::getStylesheets();
    }

    /**
     * Get The current Javascript
     *
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function getJavascript()
    {
         $jsDefault = FrontendAsset::getJavascript();
         $jsAppModules = FrontendAsset::getAppModules();
         $js = array_merge($jsDefault, $jsAppModules);

        return $js;
    }
}
