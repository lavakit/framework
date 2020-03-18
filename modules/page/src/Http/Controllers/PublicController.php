<?php

namespace Lavakit\Page\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Lavakit\Base\Http\Controllers\BaseController;

/**
 * Class PublicController
 * @package Lavakit\Page\Http\Controllers
 * @copyright 2018 Lavakit Group
 * @author hoatq <tqhoa8th@gmail.com>
 */
class PublicController extends BaseController
{
    /**
     * PublicController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return Factory|View
     * @author hoatq <tqhoa8th@gmail.com>
     */
    public function index()
    {
        return view('index.index');
    }
}
