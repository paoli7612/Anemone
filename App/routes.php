<?php

    use App\core\Router;

    Router::get('', 'home');
    Router::get('entry', 'entry');
    Router::get('logout', 'logout');
    Router::get('archive', 'archive');
    Router::get('settings', 'settings');
    Router::get('inventory', 'inventory');
    Router::get('delivery', 'delivery');
    Router::get('money', 'money');
    Router::get('calendar', 'calendar');
    Router::get('company', 'company');
    Router::get('user', 'user');

    Router::post('login', 'login');
    Router::post('logout', 'logout');
    Router::post('archive', 'archive');
    Router::post('reset', 'reset');
    Router::post('settings', 'settings');
    Router::post('slug', 'slug');
    Router::post('delivery', 'delivery');
    Router::post('inventory', 'inventory');
    Router::post('money', 'money');