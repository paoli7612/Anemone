<?php

use App\App;
use App\core\Request;
use App\Models\Delivery;
use App\Models\PrimaNota;

if (Request::uri(1) == 'dipendente') {
    $primaNota = new PrimaNota;
} else {
    $primaNota = PrimaNota::getBy('data', Request::uri(1));
}
?>

<form action="/primaNota" method="POST" class="w3-panel w3-theme w3-padding w3-card-4 w3-round-large w3-display-container">
    <br>
    <h1 class="w3-center">Prima nota</h1>
    <input type="date" name="data" value="<?= $primaNota->data ?? App::today() ?>" readonly="readonly" class="w3-input w3-card-4 w3-round-large">
    <br>
    <br>
    <div class="w3-display-topmiddle w3-padding " style="position: fixed; top: 40px; z-index: 100;">
        <div class="w3-border-green w3-panel w3-padding w3-theme w3-card-4 w3-round-large  w3-topbar w3-bottombar">
            <input id="tot" type="number" class="w3-input w3-card-4 w3-round-large" readonly>
        </div>
    </div>

    <label class="w3-panel w3-half">Totale lordo
        <input step="0.01" class="w3-card w3-input w3-round-large tc" type="number" name="lordo" placeholder="Importo netto" value="<?= $primaNota->lordo ?>">
    </label>
    <label class="w3-panel w3-half">Scontrini
        <input step="0.01" class="w3-card w3-input w3-round-large" type="number" name="scontrini" placeholder="Scontrini" step="1" value="<?= $primaNota->scontrini ?>">
    </label>
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Cassa 1</div>
        </legend>
        <label class="w3-container w3-half">
            <div class="w3-twothird">
            Pos
        </div>
        <div class="w3-third">
            Pellegrini
        </div>
            <input step="0.01" class="w3-card w3-input w3-round-large tt w3-twothird" type="number" name="pos1" placeholder="€ ( totale )" value="<?= $primaNota->lordo ?>">
            <input class="w3-card w3-input w3-third w3-round-large" type="number" step="0.01" placeholder="€" id="pellegrini2" onkeyup="$('#pellegrini').val($(this).val())" value="<?= $primaNota->lordo ?>">
        </label>
        <label class="w3-container w3-half"> Cassetto
            <input step="0.01" class="w3-card w3-input w3-round-large tt" type="number" name="cassetto1" placeholder="Bussolotto 1">
        </label>
    </fieldset>
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Cassa 2</div>
        </legend>
        <label class="w3-container w3-half"> Pos
            <input step="0.01" class="w3-card w3-input w3-round-large tt" type="number" name="pos2" placeholder="€">
        </label>
        <label class="w3-container w3-half"> Cassetto
            <input step="0.01" class="w3-card w3-input w3-round-large tt" type="number" name="cassetto2" placeholder="Bussolotto 2">
        </label>
    </fieldset>
    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Delivery</div>
        </legend>
        <?php foreach (Delivery::allDay() as $delivery) : ?>
            <div class="w3-quarter">
                <div class="w3-round-large w3-card w3-margin w3-display-container" style="padding: 0px; background-color: <?= $delivery->colore ?>; height: 150px;">
                    <a href="/delivery/<?= $delivery->slug ?>">
                        <img class="w3-round-large w3-display-topmiddle" src="/img/delivery/<?= $delivery->slug ?>.png" alt="<?= $delivery->nominativo ?>" style="height: 100px">
                    </a>
                    <div class="w3-display-bottommiddle w3-small w3-display-container" style="width: 100%">
                        <input type="number" class="w3-input w3-half tt" name="<?= $delivery->slug ?>" value="<?= $delivery->carta ?? 0 ?>" step="0.01">
                        <input type="number" class="w3-input w3-half tt" name="<?= $delivery->slug ?>c" value="<?= $delivery->contante ?? 0 ?>" step="0.01">
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </fieldset>

    <fieldset class="w3-panel w3-padding w3-round-large" style="border-color: white">
        <legend>
            <div class="w3-margin-left w3-margin-right">Buoni pasto</div>
        </legend>
        <label class="w3-container w3-half"> Edenred
            <input step="0.01" class="w3-card w3-input w3-round-large tt" type="number" name="edenred" placeholder="totale">
        </label>
        <label class="w3-container w3-half"> Pellegrini
            <input step="0.01" class="w3-card w3-input w3-round-large" type="number" id="pellegrini" name="pellegrini" placeholder="totale" onkeyup="$('#pellegrini2').val($(this).val())">
        </label>
    </fieldset>
    <script>
        $(document).on('keyup', function() {
            var total = 0;
            $('.tt').each(function(a, i) {
                total += Number($(this).val());
            });
            $('.tc').each(function(a, i) {
                total -= Number($(this).val());
            });
            console.log(total);
            $('#tot').val(Number(total.toFixed(2)));
            $('#tot').parent().toggleClass('w3-border-red', total < 0)
        });
        $(document).keyup();
    </script>
    <div class="w3-panel w3-center">
        <a href="/">Annulla</a>
        <button type="submit" class="w3-button w3-card-4 w3-round-large w3-xlarge w3-white">
            <i class="fa-solid fa-save"></i>
            Salva
        </button>
    </div>
</form>