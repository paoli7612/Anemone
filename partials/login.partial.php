<?php

use App\Models\Dipendente;
use App\Models\Dipendenti; ?>
<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <form action="/login" method="post">
        <div class="w3-panel">
            <input type="email" name="email" placeholder="Username" class="w3-input w3-card-2 w3-round-large" required value="paoli7612@gmail.com">
        </div>
        <div class="w3-panel">
            <input type="password" name="password" placeholder="Password" class="w3-input w3-card-2 w3-round-large" value="qwerty">
        </div>
        <div class="w3-panel">
            <input type="submit" value="Login" class="w3-button w3-white w3-right w3-card-2 w3-round-large">
        </div>
    </form>
</div>

<table class="w3-table-all">
    <?php foreach (Dipendente::all() as $dipendente) : ?>
        <tr>
            <td>
                <?= $dipendente->name(); ?>
            </td>
            <td>
                <?= $dipendente->id ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>