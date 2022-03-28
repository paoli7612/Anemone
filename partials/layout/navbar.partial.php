<?php

use App\core\Auth;
use App\core\Request; ?>

<div class="w3-bar w3-xlarge w3-center">
    <div class="w3-bar w3-card-4" style="border-radius: 0px 0px 10px 10px;">
        <?php if (Auth::check()) : ?>
            <a href="/inventory" class="w3-bar-item w3-button <?= (Request::name() == 'Inventory') ? 'w3-white' : 'w3-theme' ?> ">
                <i class="fa-solid fa-list-ol"></i>
            </a>
            <a href="/delivery" class="w3-bar-item w3-button <?= (Request::name() == 'Delivery') ? 'w3-white' : 'w3-theme' ?> ">
                <span class="w3-hide-small w3-hide-medium">
                    
                </span>
                <i class="fa-solid fa-person-biking"></i>
            </a>
            <a href="/money" class="w3-bar-item w3-button <?= (Request::name() == 'Money') ? 'w3-white' : 'w3-theme' ?> ">
                <span class="w3-hide-small w3-hide-medium">
                </span>
                <i class="fa-solid fa-money-bill"></i>
            </a>
            <a href="/settings" class="w3-bar-item w3-button <?= (Request::name() == 'Settings') ? 'w3-white' : 'w3-theme' ?> ">
                <span class="w3-hide-small w3-hide-medium">
                </span>
                <i class="fa-solid fa-cog"></i>
            </a>
        <?php else : ?>
            <a href="/" class="w3-bar-item w3-button <?= (Request::name() == 'Home') ? 'w3-white' : 'w3-theme' ?> ">
                <span class="w3-hide-small w3-hide-medium">
                    Home
                </span>
                <i class="fa-solid fa-house"></i>
            </a>
        <?php endif ?>
    </div>
    <a style="border-radius: 0px 0px 10px 0px;" href="/archive" class="w3-left w3-card-4 w3-button <?= (Request::name() == 'Archive') ? 'w3-white' : 'w3-theme' ?> ">
        <span class="w3-hide-small w3-hide-medium">
            Archivio
        </span>
        <i class="fa-solid fa-box"></i>
    </a>
    <?php if (Auth::check()) : ?>
        <a href="/logout" style="border-radius: 0px 0px 0px 10px;" class="w3-right w3-card-4 w3-button <?= (Request::name() == 'Entry') ? 'w3-white' : 'w3-theme' ?> ">
            <span class="w3-hide-small w3-hide-medium">
                Esci
            </span>
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    <?php else : ?>
        <a href="/entry" style="border-radius: 0px 0px 0px 10px;" class="w3-right w3-card-4 w3-button <?= (Request::name() == 'Entry') ? 'w3-white' : 'w3-theme' ?> ">
            <span class="w3-hide-small w3-hide-medium">
                Entry
            </span>
            <i class="fa-solid fa-right-to-bracket"></i>
        </a>
    <?php endif; ?>
</div>