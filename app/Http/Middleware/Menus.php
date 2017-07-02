<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Kaishiyoku\Menu\Facades\Menu;

class Menus
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Menu::registerDefault([
            Menu::link('home.index', 'Home', [], ['class' => 'nav-link']),
            Menu::link('home.about', 'About', [], ['class' => 'nav-link']),
        ], ['class' => 'navbar-nav mr-auto'], ['nav-item']);

        return $next($request);
    }
}