<?php use App\Models\Inventory; ?>
<div class="w3-panel w3-theme-l4 w3-card-4 w3-round-large">
    <h1 class="w3-center">Conteggio giornaliero</h1>
    <?php $inventorys = Inventory::dailyCount($_DAY) ?>
    <?php if (count($inventorys) == 0) : ?>
        <div class="w3-panel w3-red w3-card w3-round-large">
            <h4>Nessuna merce registrata</h4>
        </div>
    <?php else : ?>
        <table class="w3-table-all w3-margin-bottom w3-card w3-white">
            <?php foreach ($inventorys as $inventory) : ?>
                <tr>
                    <td>
                    <td>x<?= $inventory->qta ?></td>
                    <td><?= $inventory->nominativo ?></td>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    <?php endif ?>
</div>