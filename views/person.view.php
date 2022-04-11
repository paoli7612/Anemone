<?php

use App\core\Auth;
use App\core\Request;
use App\Models\Person;
use App\Models\User;

?>


<?php if (Request::getExist('slug') == 1) : ?>
    <?php $person = Person::getSlug(Request::getValue('slug')); ?>
<?php else : ?>
    <?php $person = Auth::$user->person ?>
<?php endif ?>

<div class="w3-theme w3-panel w3-round-large w3-card-4">
    <div class="w3-panel">
        <h1>
            <?= $person->name() ?>
            <span class="w3-small w3-text-grey">
                <?= $person->slug ?>
            </span>
        </h1>

    </div>
</div>