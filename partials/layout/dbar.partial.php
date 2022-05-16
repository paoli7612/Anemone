<?php use App\core\Request; ?>
<div class="w3" style="position: fixed; left: 0; bottom: 0; width: 100%">
    <div class="w3-center">
        <a href="/delivery/deliveroo" style="border-radius: 10px 10px 0px 0px; " class="w3-bar-item w3-margin-left w3-xlarge w3-button w3-card-4 w3-blue <?= (Request::uri_ends_with('deliveroo')) ? 'w3-topbar w3-bottombar w3-border-theme' : 'w3-blue' ?> ">
            Deliveroo
        </a>
        <a href="/delivery/glovo" style="border-radius: 10px 10px 0px 0px; " class="w3-bar-item w3-margin-left w3-xlarge w3-button w3-card-4 w3-yellow <?= (Request::uri_ends_with('glovo')) ? 'w3-topbar w3-bottombar w3-border-theme' : 'w3-yellow' ?> ">
            Glovo
        </a>
        <a href="/delivery/justeat" style="border-radius: 10px 10px 0px 0px; " class="w3-bar-item w3-margin-left w3-xlarge w3-button w3-card-4 w3-amber <?= (Request::uri_ends_with('justeat')) ? 'w3-topbar w3-bottombar w3-border-theme' : 'w3-orange' ?> ">
            JustEat
        </a>
        <a href="/delivery/ubereats" style="border-radius: 10px 10px 0px 0px; " class="w3-bar-item w3-margin-left w3-xlarge w3-button w3-card-4 w3-teal <?= (Request::uri_ends_with('ubereats')) ? 'w3-topbar w3-bottombar w3-border-theme' : 'w3-teal' ?> ">
            UberEats
        </a>
    </div>
</div>
