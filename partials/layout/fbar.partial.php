<?php use App\core\Request; ?>
<div class="w3-container w3-theme-l1 w3-card-4" style="position: fixed; left: 0; bottom: 0; width: 100%; border-radius: 20px 20px 0px 0px;">
    <div class="w3-left">
        <a href="/dipendente/calendar" class="w3-bar-item w3-button w3-card-4 <?= (Request::uri_ends_with('calendar')) ? 'w3-white' : 'w3-theme-l2' ?>">
            <i class="fa-solid fa-calendar"></i>
        </a>
        <a href="/dipendente/company" class="w3-bar-item w3-button w3-card-4 <?= (Request::uri_ends_with('company')) ? 'w3-white' : 'w3-theme-l2' ?>">
            <i class="fa-solid fa-sitemap"></i>
        </a>
    </div>
    <div class="w3-right">
        <a href="/dipendente/settings" class="w3-bar-item w3-button w3-card-4 <?= (Request::uri_ends_with('settings')) ? 'w3-white' : 'w3-theme-l2' ?>">
            <i class="fa-solid fa-cog"></i>
        </a>
        <a href="/logout" class="w3-bar-item w3-button w3-card-4 <?= (Request::uri_ends_with('logout')) ? 'w3-white' : 'w3-theme-l2' ?> ">
            <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
    <div class="w3-center">
        <a href="/dipendente" class="w3-bar-item w3-button w3-card-4 <?= (Request::uri() == 'dipendente') ? 'w3-white' : 'w3-theme-l2' ?> ">
            <i class="fa-solid fa-user"></i>
        </a>
    </div>
</div>