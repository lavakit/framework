<?php

namespace Lavakit\Dashboard\Http\Controllers\Admin;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Lavakit\Base\Http\Controllers\Admin\BaseAdminController;
use Lavakit\Base\Supports\Title;

/**
 * Class DashboardController
 * @package Lavakit\Dashboard\Http\Controllers\Admin
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class DashboardController extends BaseAdminController
{
    /**
     * DashboardController constructor.
     */

    /** @var string */
    protected $module = ['dashboard'];

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return Factory|View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        title()->set('Admin');
        return view('dashboard::index');
    }

    /**
     * @return Factory|View
     * @copyright 2019 Lavakit Group
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function dashboard()
    {
        title()->set('Dashboard');

        return view('dashboard::index');
    }
}
