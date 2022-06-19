<?php
    use App\core\Auth;
    use function App\core\partial;
    $aree = Auth::$dipendente->areas();
    include App\core\error('501');
?>
<?php if(count($aree) == 0): ?>
    <h1>Non ce stanno</h1>
 <?php else: ?>
    <?php foreach ($aree as $area) : ?>
        <?php require partial('area/show'); ?>
    <?php endforeach ?>
<?php endif ?>

<?php include partial('layout/fbar') ?>