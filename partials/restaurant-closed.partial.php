<div class="w3-panel w3-theme-d3 w3-card-4 w3-round-large">
    <div class="w3-panel">
        <h3 class="w3-left w3-margin-right">
            <i class="fa-solid fa-utensils"></i>
        </h3>
        <h3>
            <span><?= $restaurant->nominativo ?></span>
            <a class="w3-small" href="<?= $user->url() ?>"><?= $user->name() ?></a>
        </h3>
        <div class="w3-panel">
            <div class="w3-left">
                <b>Apertura:</b> <?= date_format(date_create($restaurant->apertura), 'd/m/Y') ?>
            </div>
            <div class="w3-right">
                <b>Chiusura:</b> <?= date_format(date_create($restaurant->chiusura), 'd/m/Y') ?>
            </div>
        </div>
    </div>
</div>