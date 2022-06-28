<?php

use App\core\Auth; ?>

<h1>Home</h1>

<?php if (Auth::$utente) : ?>
    <?php print_r(Auth::$utente) ?>
<?php endif ?>

<?php print_r($_SESSION) ?>