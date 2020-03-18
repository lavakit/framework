<?php

namespace Lavakit\Base\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use BackendAsset;

/**
 * Class BaseAdminController
 * @package Lavakit\Base\Http\Controllers\Admin
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class BaseAdminController extends Controller
{
    /** @var string */

    protected $module;
    
    /** @var array */
    protected $javascripts = [];

    /**
     * BaseAdminController constructor.
     */
    public function __construct()
    {
        $this->addJsModule();
    }

    /**
     *
     * @copyright 2020 Lavakit Group
     * @author tqhoa <tqhoa8th@gmail.com>
     */
    protected function addJsModule()
    {
        BackendAsset::addAppModule($this->javascripts);
    }
}
