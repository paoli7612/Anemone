<?php
    namespace App;

use App\core\Auth;
use App\core\Request;
use App\core\Router;

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
        if (App::$config['name'] == 'altervista')
            array_shift($_GET);
        if (Request::method() == 'GET') {
            include partial('layout/page_start');
            include Router::direct();
            include partial('layout/page_end');
        } else {
            include Router::direct();
        }
    }

    public static function theme()
    {
        if (Auth::check())
        {
            return Auth::$user->tema;
        }
        else
        {
            return "green";
        }
    }

}
