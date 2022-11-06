<?php

namespace App\core;

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