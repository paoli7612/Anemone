<?php

use App\Models\Prodotto;

 use function App\core\partial; $prodotto = Prodotto::get($_GET['id']); ?>

<div class="w3-panel w3-card-4 w3-theme  w3-round-large">
    <form action="/prodotto/delete" method="post">
        <div class="w3-panel">
            Sei sicuro di voler eliminare il prodotto: <b><?= $prodotto->nominativo ?></b>?
        </div>
        <input type="hidden" name="id" value="<?= $prodotto->id ?>">
        <div class="w3-center w3-padding">
            <button class="w3-button w3-white w3-card-4 w3-round-large">
                Elimina
            </button>
            <a href="/" class="w3-button w3-card-4 w3-round-large">Annulla</a>
        </div>
    </form>
</div>

<?php include partial('layout/fbar') ?>