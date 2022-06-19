<?php

use App\Models\Prodotto;

include App\core\error('501'); ?>

<div class="w3-panel w3-hide w3-row" id="pager">
    <div class="w3-col m5 w3-panel w3-white w3-card w3-padding">
        <?php foreach (Prodotto::all() as $prodotto) : ?>
            <button class="w3-btn w3-card w3-round-large" style="background-color: <?= $prodotto->colore ?>">
                <?= $prodotto->nominativo ?>
            </button>
        <?php endforeach ?>
    </div>
    <div class="w3-col m7 w3-panel w3-white w3-card">
            <div class="w3-row">
                <?php foreach (array(1, 2, 3, 4, 5) as $b) : ?>
                    <button class="w3-btn w3-col w3-white w3-border" style="height: 80px; width: 20%" onclick="pager(<?= $b ?>)">
                        <h3><?=  $b ?></h3>
                    </button>
                <?php endforeach ?>
            </div>
    </div>
</div>

<div class="w3-panel">
    <div class="w3-panel">
        <div class="w3-card-4 w3-margin">
            <?php foreach (array(1, 2, 3, 4, 5) as $a) : ?>
                <div class="w3-row">
                    <?php foreach (array(1, 2, 3, 4, 5) as $b) : ?>
                        <button class="w3-btn w3-col w3-white w3-border" style="height: 80px; width: 20%" onclick="pager(<?= $a * $b ?>)">
                            <h3><?= $a * $b ?></h3>
                        </button>
                    <?php endforeach ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script>
    var pager = function(n) {
        $('#pager').toggleClass('w3-hide');
    }
</script>