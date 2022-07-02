<?php

use App\App;
use App\Models\Delivery;
 ?>
<div class="w3-panel w3-row w3-center">
    <div class="w3-panel w3-theme w3-padding w3-card-4">
        <h4 class="w3-left">Inserisci i pagamenti dei delivery</h4>
        <input class="w3-input w3-card-4 w3-round-large w3-third w3-right"  type="date" name="date" value="<?= App::today() ?>" disabled="disabled">
    </div>
    <?php foreach (Delivery::all() as $delivery) : ?>
        <div class="w3-col m6 l3 w3-padding">
            <div style="padding: 0px; background-color: <?= $delivery->colore ?>" class="w3-btn w3-card-4 w3-round-large">
                <a style="text-decoration: none" href="/<?= $delivery->url() ?>">
                    <img src="/img/delivery/<?= $delivery->slug ?>.png" alt="<?= $delivery->nominativo ?>" style="height: 180px">
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
