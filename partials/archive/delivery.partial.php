<?php use App\Models\Delivery; ?>
<div class="w3-panel w3-theme-l4 w3-card-4 w3-round-large">
    <h1 class="w3-center">Delivery</h1>
    <?php $deliverys = Delivery::allDay($_DAY) ?>
    <?php if (count($deliverys) == 0) : ?>
        <div class="w3-panel w3-red w3-card w3-round-large">
            <h4>Nessun delivery registrato</h4>
        </div>
    <?php else : ?>
        <table class="w3-table-all w3-margin-bottom w3-card w3-white">
            <thead>
                <td></td>
                <td>Quanti</td>
                <td>Carta</td>
                <td>Contante</td>
            </thead>
            <?php foreach ($deliverys as $delivery) : ?>
                <tr>
                    <td><?= $delivery->nominativo ?></td>
                    <td><?= $delivery->qta ?></td>
                    <td><?= $delivery->carta ?></td>
                    <td><?= $delivery->contante ?></td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>
</div>