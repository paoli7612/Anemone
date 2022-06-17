<?php

    use App\core\Auth;
use App\Models\User;

    use function App\core\partial;
?>
<?php $aree = Auth::$dipendente->areas() ?>
<?php if(count($aree) == 0): ?>
    <h1>Non ce stanno</h1>
 <?php else: ?>
    <?php foreach ($aree as $area) : ?>
        <?php require partial('area'); ?>
    <?php endforeach ?>
<?php endif ?>

<?php include partial('layout/fbar') ?>