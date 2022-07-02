<?php

namespace App\core;

use App\Models\Area;
use App\Models\Delivery;
use App\Models\Dipendente;
use App\Models\Locale as ModelsLocale;
use App\Models\Prodotto;

class Router
{
    public static function init()
    {
        Router::get('', 'home');
        Router::get('banner');
        Router::get('login');
        Router::get('logout');
        Router::get('fascia');
        Router::get('archive');
        Router::post('archive');
        Router::post('glovo');
        Router::get('money');
        Router::get('delivery');
        Router::get('primaNota');
        Router::get('mdb/create');
        // Router::get('mdb/insert');
        // Router::get('mdb/drop');
        Router::get('mdb/all');

        Router::get('dailyCount');
        Router::get('calculator', 'calculator');
        Router::get('delivery/edit', 'delivery/edit');
        Router::get('delivery', 'delivery/all');
        Router::get('dipendente', 'dipendente/show');
        Router::get('dipendente/settings', 'settings');
        Router::get('dipendente/company', 'company');
        Router::get('dipendente/calendar', 'calendar');

        Router::post('login');
        Router::post('logout');
        Router::post('logout');
        Router::post('fascia');
        Router::post('primaNota');
        Router::post('fascia/delete', 'fascia_delete');
        Router::post('dailyCount', 'inventario/dailyCount');
        Router::post('delivery/add', 'delivery/add');
        Router::post('delivery/remove', 'delivery/remove');
        Router::post('db/reset');
        Router::post('merce/add');
        Router::post('dipendente/edit');
        try {
            Area::routes();
            Dipendente::routes();
            ModelsLocale::routes();
            Delivery::routes();
        } catch (\Throwable $th) {
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
