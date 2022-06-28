<?php use App\core\Request;
use App\Models\Delivery;

 ?>
<div class="w3" style="position: fixed; left: 0; bottom: 0; width: 100%">
    <div class="w3-center">
        <?php foreach(Delivery::all() as $delivery): ?>        
            <a href="/delivery/<?= $delivery->sigla ?>" style="border-radius: 10px 10px 0px 0px; background-color: <?= $delivery->colore ?>;" class="w3-bar-item w3-margin-left w3-xlarge w3-button w3-card-4 <?= (Request::uri_ends_with($delivery->sigla)) ? 'w3-topbar w3-bottombar w3-border-black' : '' ?> ">
                <?= $delivery->nominativo ?> 
            </a>
        <?php endforeach ?>
    </div>
</div>
