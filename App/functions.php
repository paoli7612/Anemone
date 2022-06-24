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

function bannerSmall()
{ ?>
    <script>
        ! function(d, l, e, s, c) {
            e = d.createElement("script");
            e.src = "//ad.altervista.org/js.ad/size=300X250/?ref=" + encodeURIComponent(l.hostname + l.pathname) + "&r=" + Date.now();
            s = d.scripts;
            c = d.currentScript || s[s.length - 1];
            c.parentNode.insertBefore(e, c)
        }(document, location)
    </script>
<?php
}

function bannerMedium()
{ ?>
<div class="w3-panel w3-center">

    <script>
        ! function(d, l, e, s, c) {
            e = d.createElement("script");
            e.src = "//ad.altervista.org/js.ad/size=728X90/?ref=" + encodeURIComponent(l.hostname + l.pathname) + "&r=" + Date.now();
            s = d.scripts;
            c = d.currentScript || s[s.length - 1];
            c.parentNode.insertBefore(e, c)
        }(document, location)
    </script>
</div>
<?php
}

function bannerLarge()
{ ?>
    <script>
        ! function(d, l, e, s, c) {
            e = d.createElement("script");
            e.src = "//ad.altervista.org/js.ad/size=2X2/?ref=" + encodeURIComponent(l.hostname + l.pathname) + "&r=" + Date.now();
            s = d.scripts;
            c = d.currentScript || s[s.length - 1];
            c.parentNode.insertBefore(e, c)
        }(document, location)
    </script><?php
            }
