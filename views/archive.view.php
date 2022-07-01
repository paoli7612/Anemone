<?php

use function App\core\partial; ?>
<?php
if (!isset(array_keys($_GET)[0])) {
    $_DAY = date('y-m-d');
} else {
    $_DAY = array_keys($_GET)[0];
}
?>

<!-- HEADER -->
<div class="w3-panel w3-theme w3-center w3-card-4 w3-round-large w3-display-container w3-padding">
    <a href="/archive?<?= date('y-m-d', strtotime('-1 day', strtotime($_DAY))); ?>" class="w3-button w3-margin-right w3-card w3-left w3-circle w3-white">
        <i class="fa-solid fa-left-long"></i>
    </a>
    <span class="w3-display-middle">
        <?= date_format(date_create($_DAY), 'd M') ?>
    </span>
    <a href="/archive?<?= date('y-m-d', strtotime('+1 day', strtotime($_DAY))); ?>" class="w3-button w3-margin-left w3-card w3-right w3-circle w3-white">
        <i class="fa-solid fa-right-long"></i>
    </a>
</div>

<!-- DELIVERY -->
<?php if (date_diff(date_create($_DAY), date_create())->invert) : ?>
    <div class="w3-panel">
        <div class="w3-quarter"><br></div>
        <div class="w3-theme w3-half w3-display-container w3-center w3-card-4 w3-round-large">
            <h1 class="w3-display-topmiddle">Ancora non successo</h1>
            <br><br><br><br><br><br>
        </div>
        <div class="w3-quarter"><br></div><br>
    </div>
<?php else : ?>
    <?php include partial('archive/delivery') ?>
    <?php include partial('archive/dailyCount') ?>
<?php endif ?>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <h2>Cerca</h2>
    <div class="w3-panel">
        <form action="archive" method="post">
            <input value="<?= date_format(date_create($_DAY), 'Y-m-d') ?>" type="date" name="date" class="w3-input w3-card-4 w3-round-large w3-large" onchange="this.form.submit()">
        </form>
    </div>
</div>