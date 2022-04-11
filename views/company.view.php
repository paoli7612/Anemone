<?php

use App\core\Auth;
    use function App\core\partial;
?>
<?php foreach (Auth::$user->areas() as $area) : ?>
    <?php require partial('area'); ?>
<?php endforeach ?>