<?php

use App\core\Router;
use App\Models\Area;
use App\Models\Dipendente;
use App\Models\Locale;
use App\Models\Prodotto;

function init_routes()
{
    Router::get('', 'home');
    Router::get('banner');
    Router::get('login');
    Router::get('logout');
    Router::get('archive');
    Router::post('archive');
    Router::post('glovo');
    Router::get('money');
    Router::get('delivery');
    Router::get('dailyCount');

    Router::post('login', 'login');
    Router::post('logout', 'logout');

    Router::get('calculator', 'calculator');
    Router::get('delivery', 'delivery/all');

    Router::post('dailyCount', 'inventario/dailyCount');

    Router::get('delivery/edit', 'delivery/edit');
    Router::post('delivery/add', 'delivery/add');
    Router::post('delivery/remove', 'delivery/remove');

    Router::get('dipendente', 'dipendente/show');
    Router::get('dipendente/settings', 'settings');
    Router::get('dipendente/company', 'company');
    Router::get('dipendente/calendar', 'calendar');

    Router::post('db/reset');
    Router::post('merce/add');
    Router::post('dipendente/edit');

    Router::get('locale', 'locale/all');

    foreach (array(
        Locale::class,
        Dipendente::class,
        Prodotto::class,
        Area::class
    ) as $class) {
        Router::get($class::$table);
        foreach ($class::all() as $item) {
            Router::get($item->url(), $class::$table . '/show');
        }
    }
}
