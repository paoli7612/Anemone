<?php

    use App\core\Auth;
use App\Models\User;

    use function App\core\partial;
?>
<?php foreach (Auth::$user->areas() as $area) : ?>
    <?php $user = $area->user() ?>
    <?php require partial('area'); ?>
<?php endforeach ?>