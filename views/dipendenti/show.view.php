<?php

use App\core\Auth;
use App\core\Request;
use App\Models\Dipendente;

use function App\core\partial;

?>

<?php 

    if (Request::uri(1) == 'dipendente') {
        $dipendente = Auth::$dipendente;
    } else {
        $dipendente = Dipendente::getBy('slug', Request::uri(1));
    }
?>

<div class="w3-theme w3-panel w3-round-large w3-card-4">
    <div class="w3-panel">
        <h1>
            <?= $dipendente->nome ?>
            <span class="w3-small w3-text-grey">
                <?= $dipendente->slug ?>
            </span>
        </h1>
    </div>
</div>

<?php if(Auth::$dipendente->id == $dipendente->id): ?>
    <?php require partial('layout/fbar') ?>
<?php endif ?>