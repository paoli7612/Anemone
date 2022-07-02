<?php

use App\core\Auth;
use App\core\Request; ?>

<div class="w3-bar w3-xlarge w3-center ">
    <div class="w3-bar w3-card-2" style="border-radius: 0px 0px 10px 10px;">
        <a href="/" class="w3-bar-item w3-button <?= (Request::name() == 'Home') ? 'w3-grey' : 'w3-theme' ?> ">
            <i class="fa-solid fa-house"></i>
        </a>
        <?php if (Auth::check()) : ?>
            <a href="/delivery" class="w3-bar-item w3-button <?= (Request::uri_starts_with('delivery')) ? 'w3-grey' : 'w3-theme' ?> ">
                <i class="fa-solid fa-person-biking"></i>
            </a>
            <a href="/buoniPasto" class="w3-bar-item w3-button <?= (Request::uri_starts_with('buoniPasto')) ? 'w3-grey' : 'w3-theme' ?> ">
            <i class="fa-solid fa-envelopes-bulk"></i> </a>
            <!-- <a href="/fascia" class="w3-bar-item w3-button <?= (Request::uri_starts_with('fascia')) ? 'w3-grey' : 'w3-theme' ?> ">
                <i class="fa-solid fa-clock"></i>
            </a> -->
            <a href="/primaNota" class="w3-bar-item w3-button <?= (Request::uri_starts_with('primaNota')) ? 'w3-grey' : 'w3-theme' ?> ">
                <i class="fa-solid fa-box"></i>
            </a>
            <!-- <a href="/dailyCount" class="w3-bar-item w3-button <?= (Request::uri_starts_with('dailyCount')) ? 'w3-grey' : 'w3-theme' ?> ">
                <i class="fa-solid fa-list-ol"></i>
            </a> -->
        <?php endif ?>

    </div>
    <div class="w3-bar w3-left w3-card" style="border-radius: 0px 0px 10px 0px;">
        <a href="/money" class="w3-left w3-button <?= (Request::name() == 'Money') ? 'w3-grey' : 'w3-theme' ?> ">
            <i class="fa-solid fa-money-bill"></i>
        </a>
    </div>
    <div class="w3-card w3-right" style="border-radius: 0px 0px 0px 10px;">
        <?php if (Auth::check()) : ?>
            <a style="border-radius: 0px 0px 0px 10px;" href="/dipendente" class="w3-right w3-button <?= (Request::uri_starts_with('user')) ? 'w3-grey' : 'w3-theme' ?>  ">
                <span class="w3-hide-small w3-hide-medium">
                </span>
                <i class="fa-solid fa-user"></i>
            </a>
        <?php else : ?>
            <a style="border-radius: 0px 0px 0px 10px;" href="/login" class="w3-right w3-button <?= (Request::name() == 'Entry') ? 'w3-grey' : 'w3-theme' ?> ">
                <i class="fa-solid fa-right-to-bracket"></i>
            </a>
        <?php endif; ?>
    </div>
</div>