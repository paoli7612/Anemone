<?php

use App\core\Auth;
use App\Models\Merce;

use function App\core\partial;
?>
<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <?php if (Auth::admin()) : ?>
        <fieldset class="w3-panel" style="border-color: white">
            <legend>
                <div class="w3-margin-left w3-margin-right">Database</div>
            </legend>
            <div class="w3-panel">
                <form action="/reset" method="post">
                    <input type="submit" value="Reset" class="w3-button w3-card-4 w3-white w3-round-large">
                </form>
            </div>
        </fieldset>
    <?php endif ?>
    <fieldset class="w3-panel" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Dipendente</div>
        </legend>
        <form action="/dipendente/edit" method="post" class="w3-panel">
            <div class="w3-row">
                <label class="w3-panel w3-third">
                    Tema
                    <select name="theme" class="w3-select w3-card-4 w3-round-large w3-margin-right">
                        <?php foreach (App\Models\Theme::all() as $tema) : ?>
                            <?php print_r($tema);
                            print_r(Auth::$dipendente) ?>
                            <option value="<?= $tema->id ?>" <?= (Auth::$dipendente->tema == $tema->colore) ? 'selected' : '' ?>><?= $tema->colore ?></option>
                        <?php endforeach ?>
                    </select>
                </label>
                <label class="w3-panel w3-third">
                    Slug
                    <input type="text" name="slug" class="w3-card-4 w3-input w3-round-large" value="<?= Auth::$dipendente->slug ?>">
                </label>
            </div>
            <div class=" w3-right">
                <button type="submit" class="w3-button w3-card-4 w3-round-large w3-white">
                    Salva <i class="fa-solid fa-floppy-disk"></i>
                </button>
            </div>
        </form>
    </fieldset>


</div>
<div class="w3-panel w3-theme w3-card-4">
    <h1>Prodotti</h1>
    <form action="/prodotto/add" method="post" class="w3-center w3-panel">
        <input type="text" name="nominativo" class="w3-card-4 w3-input w3-twothird w3-round-large" value="">
        <button type="submit" class="w3-button w3-card-4 w3-round-large w3-white">
            Crea prodotto <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </form>
    <form action="/prodotto/edit" method="get" class="w3-center w3-panel">
        <select id="id_prodotto" name="id" class="w3-select w3-card-4 w3-round-large w3-twothird">
            <?php foreach (App\Models\Prodotto::all() as $prodotto) : ?>
                <option value="<?= $prodotto->id ?>"><?= $prodotto->nominativo ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" class="w3-button w3-card-4 w3-round-large w3-white">
            Modifica prodotto <i class="fa-solid fa-edit"></i>
        </button>
        <button type="button" class="w3-button w3-card-4 w3-round-large w3-white" onclick="window.location='/prodotto/delete?id=' + $('#id_prodotto').val()">
            Elimina prodotto <i class="fa-solid fa-trash"></i>
        </button>
        <button type="button" class="w3-button w3-card-4 w3-round-large w3-white" onclick="window.location='/prodotto/deleteAll'">
            Elimina tutti <i class="fa-solid fa-trash"></i>
        </button>
    </form>
</div>
<div class="w3-panel w3-theme w3-card-4">
    <h1>Merci</h1>

    <fieldset class="w3-panel" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Crea merce</div>
        </legend>

        <form action="/merce/add" method="post" class="w3-row">
            <label class="w3-panel w3-col m5">
                Nominativo
                <input type="text" name="nominativo" class="w3-input w3-card w3-round-large" required="required">
            </label>
            <label class="w3-panel w3-col m3">
                Stock
                <input type="number" name="stock" class="w3-input w3-card w3-round-large" required="required">
            </label>
            <label class="w3-panel w3-col m2">
                &nbsp;
                <button class="w3-btn w3-card w3-round-large w3-white">Nuova merce</button>
            </label>
        </form>
    </fieldset>

    <fieldset class="w3-panel" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Elimina merce</div>
        </legend>
        <form action="/inventory/delete" method="post" class="w3-row">
            <label class="w3-panel w3-col m8">
                Nominativo
                <select name="id" class="w3-select w3-card w3-round-large">
                    <?php foreach (Merce::all() as $merce) : ?>
                        <option value="<?= $merce->id ?>"><?= $merce->nominativo ?></option>
                    <?php endforeach ?>
                    <select>
            </label>
            <label class="w3-panel w3-col m2">
                &nbsp;
                <button class="w3-btn w3-card w3-round-large w3-white">Elimina merce</button>
            </label>
        </form>
    </fieldset>
</div>

<?php require partial('layout/fbar') ?>