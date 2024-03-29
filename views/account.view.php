<?php

use App\core\Auth;
?>

<div class="w3-panel w3-theme-l2 w3-margin w3-padding w3-round-large w3-right w3-card">
    <h1>
        <i class="fa-solid fa-user"></i>
        <?= Auth::$account->complete_name() ?>
    </h1>
</div>
<br>

<div class="w3-panel w3-theme w3-round-large w3-card w3-padding">
    <a href="/logout" class="w3-btn w3-card w3-round-large w3-white">
        <i class="fa-solid fa-right-to-bracket"></i>
        Logout</a>
    <a href="/settings" class="w3-btn w3-card w3-round-large w3-white">
        <i class="fa-solid fa-cog"></i>
        Settings</a>
</div>