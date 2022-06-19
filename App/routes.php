<?php

    use App\core\Router;

    Router::get('', 'home');
    Router::get('login');
    Router::get('logout');
    Router::get('archive');
    Router::get('money');
    Router::get('delivery');
    Router::get('dailyCount');
    
    Router::post('login', 'login');
    Router::post('logout', 'logout');

    Router::post('inventory/dailyCount', 'dailyCount');
    Router::get('calculator', 'calculator');
    Router::get('delivery', 'delivery/all');
    Router::get('delivery/edit', 'delivery/edit');

    Router::get('dipendente');
    Router::get('dipendente/settings', 'settings');
    Router::get('dipendente/company', 'company');
    Router::get('dipendente/calendar', 'calendar');
    
    Router::post('db/reset');
    Router::post('merce/add');
    Router::post('dipendente/edit');

    /* ### PRODOTTO ### */
        Router::post('prodotto/add');
        Router::post('prodotto/edit');
        Router::get('prodotto/edit');
        Router::get('prodotto/remove');
        Router::post('prodotto/remove');
    /* ### ######## ### */

    Router::post('delivery/add', 'delivery/add');
    Router::post('delivery/remove', 'delivery/remove');

