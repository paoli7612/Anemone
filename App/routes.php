<?php

    use App\core\Router;
use App\Models\Delivery;

    Router::get('', 'home');
    Router::get('dipendente/logout', 'logout');
    Router::get('entry', 'entry');
    Router::get('archive', 'archive');
    Router::get('money', 'money');
    Router::get('settings/reset', 'reset');
    Router::post('login', 'login');
    Router::post('logout', 'logout');

    Router::get('inventory', 'inventory');
    Router::get('calculator', 'calculator');
    Router::get('delivery', 'delivery2');

    Router::get('delivery/DLV', 'delivery/DLV');
    Router::get('delivery/JE', 'delivery/JE');
    Router::get('delivery/UB', 'delivery/UB');
    Router::get('delivery/GLV', 'delivery/GLV');

    Router::get('dipendente', 'dipendente');
    Router::get('dipendente/settings', 'settings');
    Router::get('dipendente/company', 'company');
    Router::get('dipendente/calendar', 'calendar');
    
    Router::post('archive', 'archive');
    Router::post('reset', 'reset');
    Router::post('slug', 'slug');
    Router::post('delivery', 'delivery');
    Router::post('inventory/dailyCount', 'dailyCount');
    
    Router::post('merce/add', 'merce/add');
    Router::post('prodotto/add', 'prodotto/add');
    
    Router::get('prodotto/edit', 'prodotto/edit');
    Router::post('dipendente/edit', 'dipendente/edit');

    Router::post('inventory/delete', 'delete/merce');
    
    Router::get('prodotto/delete', 'prodotto/delete');
    Router::post('prodotto/delete', 'prodotto/delete');

    Router::get('prodotto/deleteAll', 'prodotto/deleteAll');
    Router::post('prodotto/deleteAll', 'prodotto/deleteAll');

    Router::post('delivery/add', 'delivery/add');
    Router::post('delivery/remove', 'delivery/remove');