<?php
    namespace App;

use App\core\Auth;
use App\core\Request;
use App\core\Router;
use App\Models\Delivery;

use function App\core\partial;

class App
{
    public static $config;
    public static $navbar;
        
    public static function main($webserver)
    {
        session_start();
        self::$config = require('config'.$webserver.'.php');
        Auth::init();

        foreach (Delivery::all() as $delivery) {
            Router::get("delivery/{$delivery->sigla}", "delivery/$delivery->sigla");
        }

        if (App::$config['name'] == 'altervista')
            array_shift($_GET);
        if (Request::method() == 'GET') {
            require partial('layout/page_start');
            include Router::direct();
            require partial('layout/page_end');
        } else {
            require partial('layout/page_start');
            include Router::direct();
            require partial('layout/page_end');
        }
    }

    public static function theme()
    {
        if (Auth::check() && Auth::$dipendente->tema)
        {
            return Auth::$dipendente->tema;
        }
        else
        {
            return 'green';
        }
    }

    public static function today()
    {
        return date("Y-m-d");
    }

}
