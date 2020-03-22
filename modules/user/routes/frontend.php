<?php

use Illuminate\Routing\Router;

/** @var $router Router */
$router->group([
    'prefix' => config('user.user.auth-prefix'),
    'middleware' => 'backend:' . config('theme.theme.types.middleware.backend')
], function (Router $router) {
    $router->get('/login', [
        'as'  => 'login',
        'uses'  => 'AuthController@getLogin'
    ]);

    if (config('user.user.allow_register')) {
        $router->get('/register', [
            'as' => 'register',
            'uses' => 'AuthController@getRegister'
        ]);
    }

    $router->get('/forgot', [
        'as'    => 'forgot',
        'uses'  => 'AuthController@getForgot'
    ]);

    $router->get('/reset/{token}', [
        'as'    => 'auth.reset',
        'uses'  => 'AuthController@getReset'
    ]);
});
