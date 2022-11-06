<?php

namespace App;

use App\core\Auth;
use App\core\Database;
use App\core\Request;
use App\core\Router;

require_once 'functions.php';

class App
{
    public static $config;
    public static $navbar;

    public static function main($webserver)
    {
        session_start();

        App::$config = require('config.php');
        
        if ($webserver == 'localhost') {
            App::$config['username'] = 'root';
            App::$config['host'] = 'localhost';
            App::$config['password'] = '';
        }

        Database::init();
        Auth::init();
        Router::init();


        if (Request::method() == 'GET') {
            require partial('layout/page_start');
            include Router::direct();
            
            require partial('layout/page_end');
        } else {
            include Router::direct();
        }

    }

    public static function theme()
    {
        if (Auth::check() && Auth::$account->theme) {
            return Auth::$account->theme;
        } else {
            return 'green';
        }
    }

    public static function today()
    {
        return date("Y-m-d");
    }
}


function view($name)
{
    return "views/$name.view.php";
}

function action($name)
{
    return "actions/$name.action.php";
}

function partial($name)
{
    return "partials/$name.partial.php";
}

function inc($path)
{
    require $path;
}

function slug($text)
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return $text;
}

function euro($value)
{
    return number_format($value, 2, ',', ' ');
}

function error($code)
{
    return partial("errors/$code");
}
