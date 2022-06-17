<?php

use App\Models\Delivery;

use function App\core\partial;

 ?>
<div class="w3-panel w3-row w3-center">
    <?php foreach (Delivery::all() as $delivery) : ?>
        <div class="w3-col m6 w3-padding">
            <div style="width: 400px; padding: 0px; background-color: <?= $delivery->colore ?>" class="w3-btn w3-card-4 w3-round-large">
                <a style="text-decoration: none" href="/delivery/<?= $delivery->sigla ?>">
                    <img src="/img/delivery/<?= $delivery->sigla ?>.png" alt="<?= $delivery->nominativo ?>" style="width: 100%; height: 280px">
                </a>
            </div>
        </div>
    <?php endforeach ?>
</div>
