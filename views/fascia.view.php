<?php

use App\Models\Fascia;
?>

<div class="w3-panel w3-theme w3-card-4 w3-round-large ">
    <h1>Letture inserite</h1>
    <table class="w3-white w3-table-all w3-margin-bottom">
        <thead>
            <th>Piade</th>
            <th>Promo Baby</th>
            <th>Scontrini</th>
            <th>Imponibile</th>
            <td></td>
        </thead>
        <?php foreach (Fascia::today() as $fascia) : ?>
            <tr>
                <td><?= $fascia->piade ?></td>
                <td><?= $fascia->baby ?></td>
                <td><?= $fascia->scontrini ?></td>
                <td><?= $fascia->imponibile ?> €</td>
                <td>
                    <form action="/fascia/delete" method="post">
                        <input type="hidden" name="id_fascia" value="<?= $fascia->id ?>">
                        <button type="submit" class="w3-btn w3-red w3-card w3-circle w3-small">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<div class="w3-panel w3-padding w3-card-4 w3-round-large w3-theme">
    <form action="/fascia" method="post">
        <div class="w3-row">
            <div class="w3-third w3-padding">
                <input class="w3-margin-bottom w3-input w3-card w3-round-large" type="number" name="p" step="1" placeholder="piade" required="required">
                <input class="w3-margin-bottom w3-input w3-card w3-round-large" type="number" name="b" step="1" placeholder="promo baby nutella" required="required">
            </div>
            <div class="w3-third w3-padding">
                <input class="w3-margin-bottom w3-input w3-card w3-round-large" type="number" name="s" step="1" placeholder="scontrini" required="required">
            </div>
            <div class="w3-third w3-padding">
                <input class="w3-margin-bottom w3-input w3-card w3-round-large" type="number" name="i1" step="0.01" placeholder="imponibile" required="required">
                <input class="w3-margin-bottom w3-input w3-card w3-round-large" type="number" name="i2" step="0.01" placeholder="imponibile">
                <input class="w3-margin-bottom w3-input w3-card w3-round-large" type="number" name="i3" step="0.01" placeholder="imponibile">
            </div>
        </div>
        <div class="w3-row w3-center">
            <button type="submit" class="w3-btn w3-card-4 w3-large w3-white w3-round-large">
                <i class="fa-solid fa-save"></i> Salva</button>
        </div>
    </form>
</div>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <h1>Fascia</h1>
    <?php $p = 0;
    $b = 0;
    $s = 0;
    $i = 0 ?>
    <table class="w3-table-all w3-white w3-margin-bottom">
        <thead>
            <th>Piade</th>
            <th>Promo Baby</th>
            <th>Scontrini</th>
            <th>Imponibile</th>
            <th>Scontrino medio</th>
        </thead>
        <?php foreach (Fascia::today() as $fascia) : ?>
            <tr>
                <td><?= $p = $fascia->piade - $p ?></td>
                <td><?= $b = $fascia->baby - $b ?></td>
                <td><?= $s = $fascia->scontrini - $s ?></td>
                <td><?= $i = $fascia->imponibile - $i ?> €</td>
                <td><?= number_format((float)$i / $s, 2, '.', '') ?> €</td>
            </tr>
        <?php endforeach ?>
    </table>
</div>