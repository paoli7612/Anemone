<?php

use App\core\Router;
use App\Models\Fascia;

$imponibile = 0;

foreach (['i1', 'i2', 'i3'] as $key) {
    if (is_numeric($_POST[$key]))
        $imponibile += $_POST[$key];
}

Fascia::create(
    ['piade', 'baby', 'scontrini', 'imponibile'],
    [$_POST['p'], $_POST['b'], $_POST['s'], $imponibile]
);

Router::redirect('/fascia');
