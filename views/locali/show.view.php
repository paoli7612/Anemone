<?php

use App\core\Request;
use App\Models\Locale;

    $locale = Locale::getBy('slug', Request::uri(1))

?>


<div class="w3-theme w3-card-4 w3-round-large w3-padding w3-display-container">

    <h1><?= $locale->nominativo ?></h1>
    <h3 class="w3-display-topright w3-panel">
        <a href="/<?= $locale->responsabile()->url()?>">
            <?= $locale->responsabile()->nomeCompleto() ?>
        </a>
    </h3>

</div>

