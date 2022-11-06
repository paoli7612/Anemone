<?php

use App\core\Request;
use App\Models\Prodotto;

$prodotto = Prodotto::getBy('slug', Request::uri(1)); ?>

<h1>
    <pre>
        <?php print_r($prodotto) ?>
    </pre>
</h1>