<?php

use Illuminate\Routing\Router;

/** @var Router $router */
$router->group(['prefix' => '/auth'], function (Router $router) {
    $router->post('/login', [
        'as'    => 'api.auth.login',
        'uses'  => 'AuthController@login',
    ]);

    $router->post('/register', [
        'as'    => 'api.auth.register',
        'uses'  => 'AuthController@register',
    ]);

    $router->get('/confirm/{token}', [
        'as'    => 'api.auth.confirm',
        'uses'  => 'AuthController@confirm'
    ]);

    $router->post('/forgot', [
        'as'    => 'api.auth.forgot',
        'uses'  => 'AuthController@forgot'
    ]);
    
    $router->post('/reset', [
        'as'    => 'api.auth.reset',
        'uses'  => 'AuthController@reset'
    ]);
    
    $router->get('/token/find/{token}', [
        'as'    => 'api.auth.token',
        'uses'  => 'AuthController@findToken'
    ]);

    $router->group(['middleware' => 'auth:api'], function (Router $router) {
        $router->get('/get-user', [
            'as'    => 'api.auth.getUser',
            'uses'  => 'AuthController@getUser',
        ]);
        
        $router->post('password/change', [
            'as'    => 'api.auth.password.change',
            'uses'  => 'AuthController@changePassword',
        ]);

        $router->get('/logout', [
            'as' => 'api.auth.logout',
            'uses' => 'AuthController@logout'
        ]);
    });
});
