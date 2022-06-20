<?php

use App\Models\Locale;

use function App\core\partial; ?>
<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <div class="w3-row">
        <h1 class="w3-left w3-margin-right">
            <i class="fa-solid fa-layer-group"></i>
        </h1>
        <h1 class="w3-left"><?= $area->nominativo ?></h1>
        <?php $areaManager = $area->responsabile() ?>
        <h3 class="w3-right">
            <span class="w3-small w3-text-grey"> area manager </span>
            <a href="<?= $areaManager->url() ?>">
                <?= $areaManager->nomeCompleto() ?>
            </a>
        </h3>
    </div>
    <div class="w3-panel">
        <?php foreach ($area->locali() as $locale) : ?>
            <?php  require partial('locale/show') ?>
        <?php endforeach ?>
    </div>
</div>