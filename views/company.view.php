<?php

use App\core\Auth;
use App\Models\Area;

 ?>

<?php foreach (Area::all() as $area) : ?>
    <div class="w3-panel w3-theme w3-card-4 w3-round-large">
        <div class="w3-row">
            <h1 class="w3-left w3-margin-right">
                <i class="fa-solid fa-layer-group"></i>
            </h1>
            <h1>
                <span style="text-decoration: underline"><?= $area->nominativo ?></span>
                <span class="w3-small"><?= $area->person()->name() ?>
                <h1>
        </div>
        <div class="w3-panel">
            <?php foreach ($area->locals() as $local) : ?>
                <div class="w3-panel w3-theme-l3 w3-card-4 w3-round-large">
                    <div class="w3-panel">
                        <h3 class="w3-left w3-margin-right">
                            <i class="fa-solid fa-utensils"></i>
                        </h3>
                        <h3>
                            <span style="text-decoration: underline"><?= $local->nominativo ?></span>
                            <span class="w3-small"><?= $local->person()->name() ?></span>
                        </h3>
                        <div class="w3-panel">
                            <?php foreach($local->persons() as $person): ?>
                                <div class="w3-quarter w3-card-4 w3-panel w3-margin w3-theme-l4">
                                    <h5 class="w3-left w3-margin-right">
                                        <i class="fa-solid fa-user"></i>
                                    </h5>
                                    <h5>
                                        <?= $person->name() ?>
                                    </h5>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
<?php endforeach ?>