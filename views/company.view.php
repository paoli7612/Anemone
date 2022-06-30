<?php

use App\core\Auth;
use function App\core\partial;

$aree = Auth::$dipendente->areas();
?>

<?php if (count($aree) == 0) : ?>
    <h1>Non ce stanno</h1>
<?php else : ?>
    <?php foreach ($aree as $area) : ?>
        <div class="w3-panel w3-theme w3-card-4 w3-round-large">
            <div class="w3-row">
                <h1 class="w3-left w3-margin-right">
                    <i class="fa-solid fa-layer-group"></i>
                </h1>
                <a href="/<?= $area->url() ?>" class="w3-left">
                    <h1><?= $area->nominativo ?></h1>
                </a>
                <?php $areaManager = $area->responsabile() ?>
                <h3 class="w3-right">
                    <span class="w3-small w3-text-grey"> area manager </span>
                    <a href="/<?= $areaManager->url() ?>">
                        <?= $areaManager->nomeCompleto() ?>
                    </a>
                </h3>
            </div>
            <div class="w3-panel">
                <?php foreach ($area->locali() as $locale) : ?>
                    <div class="w3-panwl">
                        <i class="fa-solid fa-building"></i>
                        <a href="/<?= $locale->url() ?>"><b class="w3-large"><?= $locale->nominativo ?></b></a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>

<?php include partial('layout/fbar') ?>