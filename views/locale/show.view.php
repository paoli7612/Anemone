<?php

use App\core\Request;
use App\Models\Locale;

use function App\core\partial;

$locale = Locale::get(Request::uri(1));
?>
<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <div class="w3-row">
        <h1 class="w3-left w3-margin-right">
            <i class="fa-solid fa-building"></i>
        </h1>
        <h1 class="w3-left">
            <?= $locale->nominativo ?>
        </h1>
        <?php $localeManager = $locale->responsabile() ?>
        <h3 class="w3-right">
            <span class="w3-small w3-text-grey"> shop manager </span>
            <a href="<?= $localeManager->url() ?>">
                <?= $localeManager->nomeCompleto() ?>
            </a>
        </h3>
    </div>
    <div class="w3-panel">
        Apertura: <?= $locale->apertura ?>
        <?php if($locale->chiusura): ?>
            Chiusura: <?= $locale->chiusura ?>        
        <?php endif ?>
    </div>
    <div class="w3-panel">
        <?php foreach ($locale->dipendenti() as $dipendente) : ?>
            <?php require partial('dipendente/show') ?>
        <?php endforeach ?>
    </div>
</div>