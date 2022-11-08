<?php

use function App\core\bannerLarge;
use function App\core\bannerMedium;

function item($title, $icon, $desc, $link){ ?>
    <div class="w3-panel">
        <a class="w3-btn w3-card w3-white" href="/<?= $link ?>">
            <i class="fa-solid fa-<?= $icon ?>"></i>
            <?= $title ?>
        </a>
        <?= $desc ?>
    </div>
<?php } ?>

<?php if (\App\core\Auth::check()) : ?>
    <div class="w3-panel w3-theme w3-card-4 w3-round-large">
        <h1>Bentornato</h1>
        <?php item('Account', 'user', 'Modifica anagrafica o esegui il logout', 'account') ?>
        <?php item('Cerca', 'search', 'Cerca altri altri utenti', 'search') ?>
    </div>
<?php else : ?>
    <div class="w3-panel w3-theme w3-card-4 w3-round-large">
        <h1>Welcome</h1>
        <?php item('Accedi', 'right-to-bracket', 'Accedi con le tue credenziali', 'login') ?>
        <?php item('Registrati', 'user-plus', 'Registra un nuovo account per accedere ad Anemone', 'register') ?>
    </div>
<?php endif ?>
