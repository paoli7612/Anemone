<?php

use function App\core\bannerLarge;
use function App\core\bannerMedium;

 function item($title, $icon, $desc, $link)
{ ?>
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
        <h1>Home</h1>
        <?php item('Delivery', 'person-biking', 'Inserisci i pagamenti tramite delivery', 'delivery') ?>
        <?php item('Conteggio giornaliero', 'list-ol', 'Effettua l\' giornaliero con alcune delle merci', 'dailyCount') ?>
        <?php item('Disconnetti', 'right-from-bracket', 'Effettua il login con le credenziali dipendente', 'logout') ?>
        <?php item('Conteggio cassetto', 'calculator', 'Effettua il login con le credenziali dipendente', 'money') ?>
        <?php item('Stato locale', 'building', 'Mostra lo stato attuale del locale', 'archive') ?>
        <?php item('Albero della azienda', 'sitemap', 'Mostra tutte le aree, locali, dipendenti', 'dipendente/company') ?>
        <?php item('Prima nota', 'box', 'Compila prima nota', 'primaNota') ?>
    </div>
<?php else : ?>
    <div class="w3-panel w3-theme w3-card-4 w3-round-large">
        <h1>Welcome</h1>
        <?php item('Accedi', 'right-to-bracket', 'Effettua il login con le credenziali dipendente', 'login') ?>
        <?php item('Fascia', 'clock', 'Inserisci dati fascia', 'fascia') ?>
        <?php item('Conteggio cassetto', 'calculator', 'Effettua il login con le credenziali dipendente', 'money') ?>
        <?php item('Stato locale', 'building', 'Mostra lo stato attuale del locale', 'archive') ?>

    </div>
<?php endif ?>