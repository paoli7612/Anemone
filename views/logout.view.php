<?php use function App\core\partial; ?>

<div class="w3-panel w3-card-4 w3-theme  w3-round-large">
    <form action="/logout" method="post">
        <div class="w3-panel">
            Sei sicuro di voler eseguire il logout?
        </div>
        <div class="w3-center w3-padding">
            <button class="w3-button w3-white w3-card-4 w3-round-large">
                Conferma
            </button>
            <a href="/" class="w3-button w3-card-4 w3-round-large">Annulla</a>
        </div>
    </form>
</div>

<?php include partial('layout/fbar') ?>