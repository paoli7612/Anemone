<?php

use App\Models\Delivery;
?>
<div class="w3-panel w3-theme w3-padding w3-card-4 w3-round-large">

    <label class="w3-panel w3-half">Totale lordo
        <input class="w3-card w3-input w3-round-large" type="number" name="totale" placeholder="Importo netto">
    </label>
    <label class="w3-panel w3-half">Scontrini
        <input class="w3-card w3-input w3-round-large" type="number" name="totale" placeholder="Scontrini" step="1">
    </label>
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Cassa 1</div>
        </legend>
        <label class="w3-container w3-half"> Pos
            <input class="w3-card w3-input w3-round-large" type="number" name="totale" placeholder="(compresi pellegrini)">
        </label>
        <label class="w3-container w3-half"> Cassetto
            <input class="w3-card w3-input w3-round-large" type="number" name="totale" placeholder="Cassetto cassa 1">
        </label>
    </fieldset>
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Cassa 2</div>
        </legend>
        <label class="w3-container w3-half"> Pos
            <input class="w3-card w3-input w3-round-large" type="number" name="totale" placeholder="(compresi pellegrini)">
        </label>
        <label class="w3-container w3-half"> Cassetto
            <input class="w3-card w3-input w3-round-large" type="number" name="totale" placeholder="Cassetto cassa 1">
        </label>
    </fieldset>
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Delivery</div>
        </legend>
        <?php foreach (Delivery::allDay() as $delivery) : ?>
            <div class="w3-quarter">
                <div class="w3-round-large w3-card w3-margin" style="padding: 0px; background-color: <?= $delivery->colore ?>; height: 100px;">
                    <a href="/delivery/<?= $delivery->slug ?>">
                        <img class="w3-right" src="/img/delivery/<?= $delivery->slug ?>.png" alt="<?= $delivery->nominativo ?>" style="height: 100px; border-radius: 0px 10px 10px 0px;">
                    </a>
                    <h5 class="w3-center"><?= $delivery->slug  ?> <?= ($delivery->carta == 0 ? 'no' : $delivery->carta . " €") ?></h5>
                    <h5 class="w3-center"><?= $delivery->slug  ?>C <?= ($delivery->contante == 0 ? 'no' : $delivery->contante . " €") ?></h5>
                </div>
            </div>
        <?php endforeach ?>
    </fieldset>

    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Buoni pasto</div>
        </legend>
    </fieldset>
</div>