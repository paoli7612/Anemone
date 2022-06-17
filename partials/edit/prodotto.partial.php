<div class="w3-panel w3-card-4 w3-round-large w3-theme">
    <form action="edit/prodotto" class="w3-panel">
        <div class="w3-panel w3-half">
            <label>Nominativo
                <input type="text" name="nominativo" class="w3-input w3-card w3-round" value="<?= $prodotto->nominativo ?>">
            </label>
            <div class="w3-panel">
                <fieldset style="border-color: white; width: 100%">
                    <legend>
                        <div class="w3-margin-left w3-margin-right">Aggiungi merce</div>
                    </legend>
                    <select id="id_merce" name="id_merce" class="w3-select w3-card-4 w3-round-large w3-twothird" onchange="addMerce($('#id_merce option:selected').val(), $('#id_merce option:selected').text())">
                        <?php foreach (App\Models\Merce::all() as $merce) : ?>
                            <option value="<?= $merce->id ?>"><?= $merce->nominativo ?></option>
                        <?php endforeach ?>
                    </select>
                </fieldset>
            </div>
        </div>
        <div class="w3-panel w3-half">
            <label id="merce">Merce

            </label>
        </div>
        <div class="w3-center">
            <div class="w3-quarter">.</div>
            <div class="w3-panel w3-half">
                <label>Totale
                    <input id="totale" type="number" name="nominativo" class="w3-input w3-card w3-round w3-center" value="0" readonly="readonly">
                </label>
            </div>
        </div>
        <div class="w3-panel">
            <button type="submit">
                Salva
            </button>
        </div>
    </form>
</div>


<script>
    var addMerce = function(id, nominativo, prezzo) {
        console.log(id, nominativo);
        $('#merce').append(`
            <div class="w3-row">
                <input type="text" name="nominativo" class="w3-col m9 w3-input w3-card w3-round" value="` + nominativo + `" readonly="readonly">
                <button class="w3-btn w3-circle w3-red w3-col m2 w3-right">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `);
        $('#totale').val(parseInt($('#totale').val(), 10) +prezzo);
    }

    <?php foreach ($prodotto->merci() as $merce) : ?>
        addMerce(<?= $merce->id ?>, '<?= $merce->nominativo ?>', <?= $merce->prezzo ?>);
    <?php endforeach ?>
</script>