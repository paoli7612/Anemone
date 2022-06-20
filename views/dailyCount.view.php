<?php

use App\Models\Merce;
use App\App; ?>

<form action="dailyCount" method="POST">
    <div class="w3-panel w3-theme w3-card-4 w3-round-large w3-padding">
        <input name="date" type="date" class="w3-input w3-round-large" value="<?= App::today() ?>">
    </div>
    <div class="w3-panel w3-theme w3-card-4 w3-round-large">
        <div class="w3-panel w3-white w3-topbar w3-bottombar">
            <?php foreach (Merce::dailyCount() as $merce) : ?>
                <div class="w3-center w3-display-container">
                    <div class="w3-row">
                        <div class="w3-left">
                            <img src="/img/merce/<?= $merce->img ?>" alt="<?= $merce->nominativo ?>" height="70px">
                            <span class="w3-hide-small">
                                <?= $merce->nominativo ?>
                            </span>
                            <span class="w3-hide-medium">
                                <?= $merce->sigla ?>
                            </span>
                        </div>
                    </div>
                    <div class="w3-display-right" style="width: 60%">
                        <input type="number" name="<?= $merce->id ?>_1" class="w3-input w3-card w3-round-large w3-left" style="width: 50%" placeholder="x1" onkeyup="update()">
                        <input type="number" name="<?= $merce->id ?>_<?= $merce->stock ?>" class="w3-input w3-card w3-round-large w3-right" style="width: 50%" placeholder="x<?= $merce->stock ?>" onkeyup="update()">
                    </div>
                </div>
            <?php endforeach ?>
            </table>
        </div>

        <div class="w3-center w3-panel">
            <button type="submit" class="w3-button w3-xxlarge w3-card-4 w3-white w3-round-large">
                Salva
                <i class="fa-solid fa-floppy-disk"></i>
            </button>
        </div>
    </div>
</form>