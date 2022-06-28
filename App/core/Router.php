<?php

namespace App\core;

use App\App;

class Router
{
    private static $routes = [
        'GET' => [],
        'POST' => []
    ];
    public static $titles = [];

    private static function add($uri, $method, $dest, $title)
    {
        if ($dest == NULL) {
            self::$routes[$method][$uri] = $uri;
        } else {
            self::$routes[$method][$uri] = $dest;
        }
        if ($method == 'GET')
            self::$titles[$uri] = $title;
    }

    public static function get($uri, $dest = NULL, $title = '')
    {
        self::add($uri, 'GET', $dest, $title);
    }

    public static function post($uri, $dest = NULL)
    {
        self::add($uri, 'POST', $dest, '');
    }

    public static function direct()
    {
        $uri = Request::uri();
        if (array_key_exists($uri, self::$routes[Request::method()])) {
            if (Request::method() == 'GET') {
                App::view(self::$routes[Request::method()][$uri]);
            } else {
                App::action(self::$routes[Request::method()][$uri]);
            }
        } else {
            App::view('errors/404');
        }
    }

    public static function redirect($uri = '/')
    {
        header("Location: /");
    }
}
