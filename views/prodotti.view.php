<?php

use App\Models\Prodotto;
use function App\core\partial;
?>

<?php $c = 0 ?>
<div>
    <?php foreach (Prodotto::all() as $prodotto) : ?>
        <?php if ($prodotto->categoria != $c) : ?>
</div>
<div class="w3-center w3-panel w3-border w3-white w3-card-4 w3-row">
    <h2><?= $prodotto->categoria ?></h2>
    <?php $c = $prodotto->categoria ?>
    <?php endif ?>
        <?php include partial('prodotti/section') ?>
    <?php endforeach ?>
</div>