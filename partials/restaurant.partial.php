<?php  use function App\core\partial; ?>

<div class="w3-panel w3-theme-l3 w3-card-4 w3-round-large">
    <div class="w3-panel">
        <h3 class="w3-left w3-margin-right">
            <i class="fa-solid fa-utensils"></i>
        </h3>
        <h3>
            <span style="text-decoration: underline"><?= $restaurant->nominativo ?></span>
            <span class="w3-small"><?= $restaurant->user()->name() ?></span>
        </h3>
        <div class="w3-panel">
            <?php foreach ($restaurant->users() as $user) : ?>
                <?php require partial('user') ?>
            <?php endforeach ?>
        </div>
    </div>
</div>