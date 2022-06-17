<?php

use App\core\Auth;
use App\core\Request;
use App\Models\Dipendente;

use function App\core\partial;

?>


<?php if (Request::getExist('slug') == 1) : ?>
    <?php $dipendente = Dipendente::getBySlug(Request::getValue('slug')); ?>
<?php else : ?>
    <?php $dipendente = Auth::$dipendente ?>
<?php endif ?>

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