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

<?php if(Auth::$user->id == $user->id): ?>
    <div class="w3-container w3-theme" style="position: fixed; left: 0; bottom: 0; width: 100%; border-radius: 20px 20px 0px 0px;">
        <div class="w3-left">
            <a href="/calendar" class="w3-bar-item w3-button w3-theme-l2 w3-card-4">
                <span class="w3-hide-small w3-hide-medium">
                    Calendario
                </span>
                <i class="fa-solid fa-calendar"></i>
            </a>
            <a href="/user/company" class="w3-bar-item w3-button w3-theme-l2 w3-card-4">
                <span class="w3-hide-small w3-hide-medium">
                    Azienda
                </span>
                <i class="fa-solid fa-sitemap"></i>
            </a>
        </div class="w3-left">

        <div class="w3-right">
            <a href="/user/settings" class="w3-bar-item w3-button w3-theme-l2 w3-card-4">
                <span class="w3-hide-small w3-hide-medium">
                    Impostazioni
                </span>
                <i class="fa-solid fa-cog"></i>
            </a>
            <a href="/user/logout" class="w3-bar-item w3-button w3-theme-l2 w3-card-4">
                <span class="w3-hide-small w3-hide-medium">
                    Disconnetti
                </span>
                <i class="fa-solid fa-right-from-bracket"></i>
            </a>
        </div>
    </div>
<?php endif ?>