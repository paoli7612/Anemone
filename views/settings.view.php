<?php

use App\core\Auth; ?>
<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <div class="w3-panel">
        Database
        <form action="/mdb/all" method="get">
            <input class="w3-btn w3-white w3-card w3-round-large" type="submit" value="reset" name="a">
        </form>
    </div>

    <div class="w3-panel w3-topbar">
        <br>
        <form action="/dipendente/edit" method="POST">
            <div class="w3-row">
                <label class="w3-col m4 w3-margin-right"> Tema
                    <select name="id_tema" class="w3-select w3-card w3-round-large ">
                        <?php foreach (App\Models\Tema::all() as $tema) : ?>
                            <option value="<?= $tema->id ?>" <?= (Auth::$dipendente->id_tema == $tema->id) ? 'selected="selected"' : '' ?>>
                                <?= $tema->colore ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label class="w3-col m4"> Slug
                    <input name="slug" type="text" class="w3-input w3-card w3-round-large" value="<?= Auth::$dipendente->slug ?>" required="required">
                </label>
                <button type="submit" class="w3-btn w3-card w3-round-large w3-white w3-col m2 w3-right">
                    <i class="fa-solid fa-save"></i>
                    Salva
                </button>
            </div>
        </form>
    </div>


</div>
</div>