<?php

    use App\core\Router;

    Router::get('', 'home');
    Router::get('entry', 'entry');

    Router::get('archive', 'archive');
    Router::get('money', 'money');

    Router::get('reset', 'reset');
    Router::get('inventory', 'inventory');
    Router::get('calculator', 'calculator');
    
    Router::get('delivery', 'delivery2');
    Router::get('delivery/deliveroo', 'delivery/deliveroo');
    Router::get('delivery/glovo', 'delivery/glovo');
    Router::get('delivery/justeat', 'delivery/justeat');
    Router::get('delivery/ubereats', 'delivery/ubereats');

    Router::get('dipendente', 'dipendente');
    Router::get('dipendente/settings', 'settings');
    Router::get('dipendente/logout', 'logout');
    Router::get('dipendente/company', 'company');
    Router::get('dipendente/calendar', 'calendar');

    Router::post('login', 'login');
    Router::post('logout', 'logout');
    Router::post('archive', 'archive');
    Router::post('reset', 'reset');
    Router::post('settings', 'settings');
    Router::post('slug', 'slug');
    Router::post('delivery', 'delivery');
    Router::post('inventory', 'inventory');
    Router::post('money', 'money');
