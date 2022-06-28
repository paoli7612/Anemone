<?php

use App\core\Auth;

function item($title, $link, $icon)
{ ?>
    <a href="/<?= $link ?>" class="w3-bar-item w3-btn w3-theme-l1">
        <i class="fa-solid fa-<?= $icon ?>"></i>
        <span class="w3-hide-small">
            <?= $title ?>
        </span>
    </a>
<?php } ?>


<div class="w3-bar w3-theme w3-display-container w3-large">
    <?php item('Home', '', 'home') ?>
    <div class="w3-display-middle">
        <?php item('Conta', 'money', 'money-bill') ?>
    </div>
    <div class="w3-right">
        <?php if (Auth::$utente) : ?>
            <?php item('Account', 'account', 'user') ?>
        <?php else : ?>
            <?php item('Accedi', 'login', 'right-to-bracket') ?>
        <?php endif ?>
    </div>
</div>