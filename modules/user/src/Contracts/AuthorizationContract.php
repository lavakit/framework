<?php

namespace Lavakit\User\Contracts;

use Illuminate\Http\Request;

/**
 * Interface AuthorizationContract
 * @package Lavakit\User\Contracts
 *
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
interface AuthorizationContract
{
    /**
     * Authenticate a user
     *
     * @param Request $request
     * @return mixed
     *
     * @copyright 2020 Lavakit Group
     */
    public function login(Request $request);

    /**
     * Register a new user
     *
     * @param $request
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function register(Request $request);

    /**
     * Confirmation
     *
     * @param string $token
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function confirm(string $token);

    /**
     * Reset password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function reset(Request $request);

    /**
     * Forgot password
     *
     * @param Request $request
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function forgot(Request $request);

    /**
     * Logout the user of the application
     *
     * @param Request $request
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function logout(Request $request);
    
    /**
     * Get the user detail
     *
     * @param Request $request
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function user(Request $request);
    
    /**
     * Find token
     *
     * @param $token
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function findToken($token);
    
    /**
     * Change password by User request
     *
     * @param Request $request
     * @return mixed
     * @copyright 2020 Lavakit Group
     */
    public function changePassword(Request $request);
}
