<?php

use App\App;
use App\Models\Delivery;

?>
<form action="delivery" method="post">
    <div class="w3-row w3-center">
        <div class="w3-panel w3-theme w3-card-4 w3-round-large">
            <div class="w3-panel w3-half">
                <input type="date" class="w3-input w3-round-large w3-theme-l2" value="<?= App::today() ?>" readonly="readonly">
            </div>
            <div class="w3-panel w3-half">
                <select name="fascia" class="w3-select w3-round-large">
                    <option value="1">Apertura-15:00</option>
                    <option value="2">15:00-18:00</option>
                    <option value="3">18:00-Chiusura</option>
                </select>
            </div>
        </div>
    </div>


    <?php foreach (array('Deliveroo' => 'blue', 'Glovo' => 'yellow', 'JustEat' => 'orange', 'UberEats' => 'green') as $name => $color) : ?>
        <div class="w3-panel w3-<?= $color ?> w3-card-4 w3-round-large">
            <h3><?= $name ?></h3>
            <table class="w3-table">
                <tr>
                    <th class="w3-center">App
                        <button type="button" id="<?= $name ?>App" class="w3-btn w3-card w3-white w3-round-large w3-left">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </th>
                    <th class="w3-center">Contante
                        <button type="button" id="<?= $name ?>Contante" class="w3-btn w3-card w3-white w3-round-large w3-right">
                            <i class="fa fa-xmark"></i>
                        </button>
                    </th>
                </tr>
                <tr>
                    <td id="<?= $name ?>App">
                        <input name="<?= $name ?>App[]" step="0.01" id="<?= $name ?>App" type="number" class="w3-input w3-card w3-round-large w3-margin-bottom" placeholder="€">
                    </td>
                    <td id="<?= $name ?>Contante">
                        <input name="<?= $name ?>Contante[]" step="0.01" id="<?= $name ?>Contante" type="number" class="w3-input w3-card w3-round-large w3-margin-bottom" placeholder="€">
                    </td>
                </tr>
                <tr>
                    <td id="<?= $name ?>App" class="w3-center">
                        <span id="total<?= $name ?>App">0,00</span> €
                    </td>
                    <td id="<?= $name ?>Contante" class="w3-center">
                        <span id="total<?= $name ?>Contante">0,00</span> €
                    </td>
                </tr>
            </table>
        </div>
        <script>
            $('button[id^="<?= $name ?>"]').on('click', function() {
                canc($(this).attr('id'));
            });
            $('input[id^="<?= $name ?>"]').on('keyup', function() {
                update($(this).attr('id'))
            });
            $('input[id^="<?= $name ?>"]').on('keyup', function(event) {
                var tuttipieni = true;
                $('input[name="' + $(this).attr('name') + '"]').each(function(a, i) {
                    if (i.value == '') {
                        tuttipieni = false;
                    }
                });
                if (tuttipieni) {
                    c = $(this).clone(true).val('')
                    $(this).parent().append(c);
                }
            });

            var canc = function(s) {
                var ii = $('td#' + s + ' input')
                if (ii.length > 1)
                    ii.last().remove();
                else
                    ii.first().val('');
                update(s);
            }

            var update = function(s) {
                var t = 0;
                $('td#' + s + ' input').each(function() {
                    t += Number($(this).val());
                })
                $('#total' + s).html(t.toFixed(2));
            }
        </script>
    <?php endforeach; ?>
    <div class="w3-center">
        <button type="submit" class="w3-button w3-xxlarge w3-card-4 w3-theme">
            Salva
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>
    <script>
        $(document).on("keypress", 'form', function(e) {
            var code = e.keyCode || e.which;
            if (code == 13) {
                e.preventDefault();
                return true;
            }
        });
        <?php $deliverys = Delivery::allDay(date('Y-m-d')); ?>
        <?php foreach ($deliverys as $dlv): ?>
            $('input#<?= $dlv->nome ?>').last().val(<?= $dlv->valore ?>).keyup()
        <?php endforeach; ?>
    </script>
</form>