<?php

namespace App\core;

use App\Models\Area;
use App\Models\Delivery;
use App\Models\Dipendente;
use App\Models\Locale as ModelsLocale;
use App\Models\PrimaNota;
use App\Models\Prodotto;

class Router
{
    public static function init()
    {
        Router::get('', 'home');
        Router::get('destroy');

        if (Auth::check()) {
            Router::get('account');
            Router::get('settings');
            Router::post('settings');
            Router::get('logout');
            Router::post('logout');

            Router::get('search');
        } else {
            Router::get('login');
            Router::post('login');
            Router::get('register');
            Router::post('register');
        }
    }

    private static $routes = [
        'GET' => [],
        'POST' => []
    ];

    private static function add($uri, $method, $dest)
    {
        if ($dest == NULL) {
            self::$routes[$method][$uri] = $uri;
        } else {
            self::$routes[$method][$uri] = $dest;
        }
    }

    public static function get($uri, $dest = NULL)
    {
        self::add($uri, 'GET', $dest);
    }

    public static function post($uri, $dest = NULL)
    {
        self::add($uri, 'POST', $dest);
    }

    public static function direct()
    {
        if (array_key_exists(Request::uri(), self::$routes[Request::method()])) {
            if (Request::method() == 'GET') {
                return view(self::$routes[Request::method()][Request::uri()]);
            } else {
                return action(self::$routes[Request::method()][Request::uri()]);
            }
        } else {
            return view('errors/404');
        }
    }

    public static function redirect($uri)
    {
        header("Location: $uri");
    }

    public static function view()
    {
        if (array_key_exists(Request::uri(), self::$routes['GET'])) {
            return view(self::$routes['GET'][Request::uri()]);
        } else {
            return view('error');
        }
    }
}
