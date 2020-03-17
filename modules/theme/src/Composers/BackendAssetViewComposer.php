<?php

namespace Lavakit\Theme\Composers;

use Illuminate\View\View;
use BackendAsset;

/**
 * Class BackendAssetViewComposer
 * @package Lavakit\Theme\Composers
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class BackendAssetViewComposer
{
    /**
     * @param View $view
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    public function compose(View $view)
    {
        $cssBackendFiles = $this->getStylesheet();
        $jsBackendFiles  = $this->getJavascript();

        $view->with(compact('cssBackendFiles'));
        $view->with(compact('jsBackendFiles'));
    }

    /**
     * Get the current Stylesheet
     *
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function getStylesheet()
    {
        return BackendAsset::getStylesheets();
    }

    /**
     * Get The current Javascript
     *
     * @return mixed
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function getJavascript()
    {
        $jsDefault = BackendAsset::getJavascript();
        $jsAppModules = BackendAsset::getAppModules();
        $js = array_merge($jsDefault, $jsAppModules);

        return $js;
    }
}
