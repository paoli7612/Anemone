<?php

namespace App;

use App\core\Auth;
use App\core\Database;
use App\core\Request;
use App\core\Router;

class App
{

    public static $config;
    public static $title;

    public static function init()
    {
        session_start();
        self::$config = require('config.php');
        Database::init();
        Auth::init();
        self::routes();

        if (App::$config['name'] == 'altervista')
            array_shift($_GET);

        if (Request::method() == 'GET') {
            if (array_key_exists(Request::uri(), Router::$titles)) {
                App::$title =  Router::$titles[Request::uri()];
            }
            App::partial('layout/page_start');
            Router::direct();
            App::partial('layout/page_end');
        } else {
            Router::direct();
        }
    }

    public static function routes()
    {
        Router::get('', 'home', 'Home');
        Router::get('login', 'login', 'Accedi');

        if (Auth::$utente) {
            Router::get('account', 'account', Auth::$utente->cognome);
            Router::get('settings', 'settings', 'Impostazioni');
            Router::get('logout', 'logout', 'Disconnetti');

            if (Auth::amministratore())
            {   
                Router::get('account/create', 'register', 'Crea utente');
                Router::post('db/reset');
                Router::post('account/create');

            }
        }
     
        Router::post('login');
        Router::post('logout');
    }

    public static function view($name)
    {
        include "views/$name.view.php";
    }

    public static function partial($name)
    {
        include "partials/$name.partial.php";
    }

    public static function action($name)
    {
        include "actions/$name.action.php";
    }
   
}

