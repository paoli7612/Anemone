<?php

use App\App;
use App\Models\Delivery;
?>
<?php $delivery = Delivery::getBy('nominativo', $nominativo) ?>

<div class="w3-panel w3-card-4 w3-round-large" style="background-color: <?= $delivery->colore ?>">
    <h1><?= $delivery->nominativo ?></h1>
</div>

<script>
    var id = 1;
    var elimina = function(id) {
        var totale = parseInt($('#'+id+' .totale').text());
        var fascia = parseInt($('#'+id+' .fascia').text());
        console.log(id, totale, fascia);
        $.ajax({
            method: "POST",
            url: '/delivery/remove',
            data: {
                "totale": totale, 
                "fascia": fascia
            }
        }).done(function() {
            console.log(id + " eliminato");
        });
    }

    var mostra = function(totale, fascia) {
        $('#lista').append(`
            <tr id="` + (id) + `">
                <td class="totale">
                    ` + totale + `
                </td>
                <td class="fascia">
                    ` + fascia + `
                </td>
                <td>
                    <button class="w3-btn w3-circle w3-card" onclick="elimina(` + id + `)">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        `);
        id=id+1;
    };
    var aggiungi = function(totale, fascia) {
        if (!totale) return;
        $.ajax({
            method: "POST",
            url: '/delivery/add',
            data: {
                "totale": totale,
                "id": <?= $delivery->id ?>,
                "tempo": $('#tempo').val()
            }
        }).done(function() {
            console.log(id);
            mostra(totale, fascia)
        });
    }
</script>

<div class="w3-panel w3-card-4 w3-round-large" style="background-color: <?= $delivery->colore ?>">
    <table class="w3-panel w3-table-all w3-card" id="lista">
        <tr><th>Prezzo</th><th>Fascia</th><th></th></tr>
    </table>
</div>

<div class="w3-panel w3-card-4 w3-round-large" style="background-color: <?= $delivery->colore ?>">
    <div class="w3-panel w3-row">
        <label class="w3-col m5 w3-margin-left">
            <select id="tempo" class="w3-select w3-card w3-round-large">
                <option value="<?= App::today() ?> 12:00:00">apertura-15:00</option>
                <option value="<?= App::today() ?> 16:00:00">15:00-18:00</option>
                <option value="<?= App::today() ?> 19:00:00">18:00-chiusura</option>
            </select>
            tempo
        </label>
        <label class="w3-col m3">
            <input type="number" id="totale" class="w3-input w3-card w3-round-large">
            totale
        </label>
        <div class="w3-col m2 w3-right">
            <button id="submit" class="w3-btn w3-card w3-white w3-circle" onclick="aggiungi($('#totale').val(), $('#tempo').val())">
                <i class="fa fa-plus"></i>
            </button>
        </div>

    </div>
</div>

<script>
    $("#totale").keyup(function(event) {
    if (event.keyCode === 13) {
        $("#submit").click();
    }
});
<?php foreach(Scontrino::delivery($delivery->id, App::today()) as $scontrino): ?>
    mostra(<?= $scontrino->totale ?>, <?= $scontrino->fascia ?>);
<?php endforeach ?>
</script>

