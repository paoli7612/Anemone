<?php

use function App\core\partial; ?>


<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <div class="w3-row">
        <h1 class="w3-left w3-margin-right">
            <i class="fa-solid fa-layer-group"></i>
        </h1>
        <h1>
            <span style="text-decoration: underline"><?= $area->nominativo ?></span>
            <span class="w3-small"><?= $area->user()->name() ?>
        <h1>
    </div>
    <div class="w3-panel">
        <?php foreach ($area->restaurants() as $restaurant) : ?>
            <?php require partial('restaurant') ?>
        <?php endforeach ?>
    </div>
</div>