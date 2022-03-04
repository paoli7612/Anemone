<div class="w3-panel w3-theme w3-card-4">
    <h1>Home</h1>

    <form action="/reset" method="post" class="w3-panel">
        <input type="submit" value="Reset" class="w3-button w3-card-4 w3-white">
    </form>

    <form action="settings" method="post" class="w3-center">
        <select name="theme" class="w3-select w3-card-4 w3-round-large w3-twothird">
            <?php

use App\core\Auth;

 foreach (App\Models\Theme::all() as $tema) : ?>
                <option value="<?= $tema->id ?>"
                <?= (Auth::$user->idTema==$tema->id) ? 'selected' : '' ?>><?= $tema->nome ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" class="w3-button w3-card-4 w3-round-large w3-white">
            Salva
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </form>

</div>