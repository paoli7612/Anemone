<?php

use App\Models\Delivery;
use App\Models\Inventory;

if (!isset(array_keys($_GET)[0])) {
    header('Location: /archive?' . date('Y-m-d'));
} ?>

<?php $_DAY = array_keys($_GET)[0] ?>
    <div class="w3-panel w3-theme w3-center w3-card-4 w3-round-large w3-display-container w3-padding">
        <a href="/archive?<?= date('y-m-d', strtotime('-1 day', strtotime($_DAY))); ?>" class="w3-button w3-margin-right w3-card w3-left w3-circle w3-white">
            <i class="fa-solid fa-left-long"></i>
        </a>
        <span class="w3-display-middle">
            <?= date_format(date_create($_DAY), 'd M') ?>
        </span>
        <a href="/archive?<?= date('y-m-d', strtotime('+1 day', strtotime($_DAY))); ?>" class="w3-button w3-margin-left w3-card w3-right w3-circle w3-white">
            <i class="fa-solid fa-right-long"></i>
        </a>
    </div>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <h1 class="w3-center">Delivery</h1>
    <?php $deliverys = Delivery::day($_DAY) ?>
    <?php if(count($deliverys) == 0): ?>
        <div class="w3-panel w3-red w3-card w3-round-large">
            <h4>Ancora nessun delivery inserito</h4>
        </div>
    <?php else: ?>
        <table class="w3-table-all w3-margin-bottom w3-card">
            <tr>
                <th>Nome</th>
                <th>Prezzo</th>
                <th>Quanti</th>
            </tr>
            <?php foreach ($deliverys as $delivery) : ?>
                <tr>
                    <td><?= $delivery->nome ?></td>
                    <td>€ <?= $delivery->prezzo ?></td>
                    <td><?= $delivery->quanti ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>
</div>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <h1 class="w3-center">Inventario</h1>
    <?php $inventorys = Inventory::day($_DAY) ?>
    <?php if(count($inventorys) == 0): ?>
        <div class="w3-panel w3-red w3-card w3-round-large">
            <h4>Ancora nessun prodotto registrato</h4>
        </div>
    <?php else: ?>
        <table class="w3-table-all w3-margin-bottom w3-card">
            <?php foreach ($inventorys as $inventory) : ?>
                <tr>
                    <td>
                    <td>x<?= $inventory->numero ?></td>
                    <td><?= $inventory->nome ?></td>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>
</div>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <h2>Cerca</h2>
    <div class="w3-panel">
        <form action="archive" method="post">
            <input type="date" name="date" class="w3-input w3-card-4 w3-round-large w3-large" onchange="this.form.submit()">
        </form>
    </div>
</div>