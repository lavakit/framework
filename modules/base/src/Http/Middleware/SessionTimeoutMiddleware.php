<?php

namespace Lavakit\Base\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Contracts\Session\Session;
use Illuminate\Session\Store;

/**
 * Class SessionTimeoutMiddleware
 * @package Lavakit\Base\Http\Middleware
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
class SessionTimeoutMiddleware
{
    /**
     * Instance of Session Store
     * @var Store
     */
    protected $session;

    /**
     * Time for user to remain active, set to 3600 seconds( 60minutes )
     *
     * @var int $timeout
     */
    protected $timeout = 3;

    /** @var string */
    protected $redirectUrl = 'login';

    /** @var string */
    protected $level = 'alert-info';

    /** @var string */
    protected $key = 'last_activity_time';

    /**
     * SessionTimeoutMiddleware constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($this->session->has($this->key) && $this->check()) {
            $this->session->forget($this->key);
            Auth::logout();

            return redirect()->route($this->getRedirectUrl())->with([
                $this->flashLevel() => 'Your has session expired'
            ]);
        }

        $this->session->put($this->key, time());

        return $next($request);
    }

    /**
     * Check if it is session expired
     *
     * @return bool
     */
    private function check()
    {
        if ((time() - $this->session->get($this->key)) > $this->getTimeOut()) {
            return true;
        }

        return false;
    }

    /**
     * Get timeout from laravel default's session lifetime, if it's not set/empty, set timeout to 15 minutes
     * @return int
     */
    private function getTimeOut()
    {
        return  $this->getLifeTime() ?: $this->timeout;
    }

    /**
     * Get redirect url from env file
     * @return string
     */
    private function getRedirectUrl()
    {
        return  (env('SESSION_TIMEOUT_REDIRECT_URL')) ?: $this->redirectUrl;
    }

    /**
     * Get Session label from env file
     * @return string
     */
    private function flashLevel()
    {
        return  (env('SESSION_FLASH_LEVEL')) ?: $this->level;
    }

    /**
     * Get timeout from laravel default's session lifetime
     *
     * @return int
     */
    private function getLifeTime()
    {
        return round(config('session.lifetime') * 60);
    }
}
