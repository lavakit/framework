<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/pages'], function (Router $router) {
    $router->get('/', [
        'as'    => 'admin.page.index',
        'uses'  => 'PageController@index'
    ]);
});
