<?php

namespace App\core;

    class Request
    {
        public static function method()
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        public static function uri($index = -1)
        {
            $uri = trim(strtok($_SERVER["REQUEST_URI"], '?'), '/');
            $items = explode('/', $uri);
            return array_key_exists($index, $items) ? $items[$index] : $uri;
        }

        public static function name()
        {
            if (!$name = Request::uri()) {
                $name = 'home';
            }
            return ucfirst($name);
        }
        
        public static function getExist($key)
        {
            return array_key_exists($key, $_GET);
        }

        public static function getValue($key)
        {
            return $_GET[$key];
        }

        public static function uri_starts_with($str)
        {
            $s = substr(self::uri(), 0, strlen($str)+1 );
            return $s == $str || $s == $str."/";
        }

        public static function uri_ends_with($str)
        {
            $s = substr(self::uri(), strlen(self::uri()) - strlen($str), strlen(($str)));
            return $s == $str;
            //return str_contains(self::uri(), $str);
        }
    }
