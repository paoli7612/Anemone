<?php

use App\core\Auth;
?>
<form action="/settings" method="post">

    <div class="w3-panel w3-theme w3-card-4 w3-round-large w3-padding">
        <h1>Settings</h1>
        <div class="w3-row">
            <label class="w3-panel w3-half">Name
                <input class="w3-input w3-round-large" type="text" name="name" placeholder="name" value="<?= Auth::$account->name ?>">
            </label>
            <label class="w3-panel w3-half">Surname
                <input class="w3-input w3-round-large" type="text" name="surname" placeholder="surname" value="<?= Auth::$account->surname ?>">
            </label>
            <label class="w3-panel w3-twothird">Username
                <input class="w3-input w3-round-large" type="text" name="username" placeholder="username" value="<?= Auth::$account->username ?>" disabled>
            </label>
            <label class="w3-panel w3-twothird">Email
                <input class="w3-input w3-round-large" type="email" name="email" placeholder="email" value="<?= Auth::$account->email ?>" disabled>
            </label>
        </div>
        <div class="w3-right">
            <a href="" class="w3-link">Annulla</a>
            <button type="submit" class="w3-button w3-card-4 w3-round-large w3-white">
                Salva
            </button>
        </div>
    </div>
</form>