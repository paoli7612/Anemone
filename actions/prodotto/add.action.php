<?php

use App\core\Router;
use App\Models\Prodotto;

    Prodotto::create(['nominativo'], [$_POST['nominativo']]);
    $prodotto = Prodotto::getBy('nominativo', $_POST['nominativo']);
    Router::redirect($prodotto->path('edit'));
