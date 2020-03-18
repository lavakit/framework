<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->get('/', [
   'as' => 'page.index',
   'uses' => 'PublicController@index',
   'middleware' => config('page.page.middleware')
]);
