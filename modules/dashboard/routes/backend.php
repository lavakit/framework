<?php

use Illuminate\Routing\Router;

/** @var Router $router */

$router->get('/', [
    'as' => 'admin.dashboards.index',
    'uses' => 'DashboardController@index'
]);

$router->get('/dashboard', [
   'as' => 'admin.dashboards.dashboard',
   'uses' => 'DashboardController@dashboard'
]);
