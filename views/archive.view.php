<?php

use App\Models\Delivery;
use App\Models\Inventory;

if (!isset(array_keys($_GET)[0])) {
    header('Location: /archive?' . date('y-m-d'));
}

?>

<?php $_DAY = array_keys($_GET)[0] ?>

<!-- HEADER -->
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

<!-- DELIVERY -->
<?php if (date_diff(date_create($_DAY), date_create())->invert) : ?>
    <h1>Ancora non successo</h1>
<?php else : ?>
    <div class="w3-panel w3-theme-l2 w3-card-4 w3-round-large">
        <h1 class="w3-center">Delivery</h1>
        <?php $deliverys = Delivery::day($_DAY) ?>
        <?php if (count($deliverys) == 0) : ?>
            <div class="w3-panel w3-red w3-card w3-round-large">
                <h4>Ancora nessun delivery inserito</h4>
            </div>
        <?php else : ?>
            <table class="w3-table-all w3-margin-bottom w3-card w3-white">
                <tr>
                    <th>Nome</th>
                    <th>Prezzo</th>
                    <th>Quanti</th>
                    <th>Fascia</th>
                </tr>
                <?php foreach ([1, 2, 3] as $n) : ?>
                    <?php foreach ($deliverys as $delivery) : ?>
                        <tr class="w3-theme-l<?= 5 - $delivery->fascia ?>">
                            <?php if ($delivery->fascia == $n) : ?>
                                <td><?= $delivery->nome ?></td>
                                <td>€ <?= $delivery->valore ?></td>
                                <td><?= $delivery->quanti ?></td>
                                <?php if ($delivery->fascia == 1) : ?>
                                    <td>Pranzo (apertura-15)</td>
                                <?php elseif ($delivery->fascia == 2) : ?>
                                    <td>Pomeriggio (15-18)</td>
                                <?php else : ?>
                                    <td>Sera (18-chiusura)</td>
                                <?php endif ?>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                <?php endforeach ?>
            </table>
        <?php endif ?>
    </div>

    <!-- INVENTORY -->
    <div class="w3-panel w3-theme-l4 w3-card-4 w3-round-large">
        <h1 class="w3-center">Inventario</h1>
        <?php $inventorys = Inventory::day($_DAY) ?>
        <?php if (count($inventorys) == 0) : ?>
            <div class="w3-panel w3-red w3-card w3-round-large">
                <h4>Ancora nessun prodotto registrato</h4>
            </div>
        <?php else : ?>
            <table class="w3-table-all w3-margin-bottom w3-card w3-white">
                <?php foreach ($inventorys as $inventory) : ?>
                    <tr>
                        <td>
                        <td>x<?= $inventory->quantita ?></td>
                        <td><?= $inventory->merce ?></td>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        <?php endif ?>
    </div>
<?php endif ?>



<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <h2>Cerca</h2>
    <div class="w3-panel">
        <form action="archive" method="post">
            <input value="<?= date_format(date_create($_DAY), 'Y-m-d') ?>" type="date" name="date" class="w3-input w3-card-4 w3-round-large w3-large" onchange="this.form.submit()">
        </form>
    </div>
</div>