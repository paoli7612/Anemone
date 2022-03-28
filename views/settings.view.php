<?php

use App\core\Auth; ?>
<div class="w3-panel w3-theme w3-card-4">
    <h1>Home</h1>

    <fieldset class="w3-panel" style="border-color: white">
        <legend>Database</legend>

        <div class="w3-panel">
            <form action="/reset" method="post">
                <input type="submit" value="Reset" class="w3-button w3-card-4 w3-white">
            </form>
            <form action="/clear-today" method="post">
                <input type="submit" value="Clear today" class="w3-button w3-card-4 w3-white">
            </form>
        </div>
        
    </fieldset>
    <fieldset class="w3-panel" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Tema</div>
        </legend>
        <form action="settings" method="post" class="w3-center w3-panel">
            <select name="theme" class="w3-select w3-card-4 w3-round-large w3-twothird">
                <?php foreach (App\Models\Theme::all() as $tema) : ?>
                    <option value="<?= $tema->id ?>" <?= (Auth::$user->idTema == $tema->id) ? 'selected' : '' ?>><?= $tema->nome ?></option>
                <?php endforeach ?>
            </select>
            <button type="submit" class="w3-button w3-card-4 w3-round-large w3-white">
                Salva
                <i class="fa-solid fa-floppy-disk"></i>
            </button>
        </form>
    </fieldset>

</div>