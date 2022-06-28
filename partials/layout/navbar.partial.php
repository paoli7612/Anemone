<?php

use App\core\Auth;

function item($title, $link, $icon)
{ ?>

    <a href="/<?= $link ?>" class="">
        <i class="fa-solid fa-<?= $icon ?>"></i>
    <?= $title ?></a>

<?php } ?>


<div class="w3-bar w3-theme">
    <a href="/" class="w3-bar-item">Home</a>
    <div class="w3-right w3-bar-item w3-bar">
        <?php if (Auth::$utente) : ?>
            <?php item('Account', 'account', 'user') ?>
        <?php else : ?>
            <?php item('Accedi', 'login', 'right-to-bracket') ?>
        <?php endif ?>
    </div>
</div>