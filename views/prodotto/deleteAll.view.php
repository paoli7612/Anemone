<?php use App\Models\Prodotto; ?>

<div class="w3-panel w3-card-4 w3-theme  w3-round-large">
    <form action="/prodotto/deleteAll" method="post">
        <div class="w3-panel">
            Sei sicuro di voler eliminare tutti i prodotti?
        </div>
        <div class="w3-panel">
            <?php foreach(Prodotto::all(10) as $prodotto): ?>
                <b><?= $prodotto->nominativo ?></b>,
            <?php endforeach ?>...
        </div>
        <div class="w3-center w3-padding">
            <button class="w3-button w3-white w3-card-4 w3-round-large">
                Elimina
            </button>
            <a href="/dipendente/settings" class="w3-button w3-card-4 w3-round-large">Annulla</a>
        </div>
    </form>
</div>
