<?php

use App\core\Auth;
use App\core\Request;
use App\Models\User;

?>


<?php if (Request::getExist('slug') == 1) : ?>
    <?php $user = User::getBySlug(Request::getValue('slug')); ?>
<?php else : ?>
    <?php $user = Auth::$user ?>
<?php endif ?>

<div class="w3-theme w3-panel w3-round-large w3-card-4">
    <div class="w3-panel">
        <h1>
            <?= $user->nome ?>
            <span class="w3-small w3-text-grey">
                <?= $user->slug ?>
            </span>
        </h1>

    </div>
</div>