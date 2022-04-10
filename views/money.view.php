<form action="money" method="post">
    <div class="w3-theme w3-round-large" style="padding-top: 4px; padding-bottom: 4px">
        <div class="w3-panel w3-center w3-large">
            <div class="w3-col w3-center" style="width: 90px">Valore</div>
            <div class="w3-col" style="width: 250px">Quantità</div>
            <div class="w3-rest">Totale</div>
        </div>
        <?php for ($i = 0; $i < 4; $i++) : ?>
            <?php foreach (array(1, 2, 5) as $value) : ?>
                <?php $value *= pow(10, $i) ?>
                <div class="w3-panel w3-row">
                    <div class="w3-col w3-center" style="width: 90px; margin-right:16px">
                        <img src="/img/<?= $value / 100 ?>.png" height="50px">
                    </div>
                    <div class="w3-rest">
                        <input step="1" min="0" type="number" class="w3-input w3-round-large" placeholder="Quantità" onkeyup="$('#c<?= $value ?>').val(($(this).val()*<?= $value ?>)/100); update()">
                    </div>
                    <input type="number" id="c<?= $value ?>" class="w3-hide" placeholder="€" readonly>
                </div>
            <?php endforeach ?>
        <?php endfor ?>
        <div class="w3-panel w3-row">
            <div class="w3-col w3-center" style="width: 90px; margin-right:16px">
                <img src="/img/moneta.jpg" height="50px">
            </div>
            <div class="w3-rest">
                <input min="0" type="number" class="w3-input w3-round-large" placeholder="€" onkeyup="$('#cMoneta').val($(this).val()); update()">
            </div>
            <input type="number" id="cMoneta" class="w3-hide" placeholder="" readonly>
        </div>
        <div class="w3-panel w3-center">
            <input id="tot" name="tot" type="number" class="w3-input w3-card-4 w3-round-large" readonly>
        </div>
    </div>
    <script>
        var update = () => {
            let tot = 0;
            $('input[id^=c]').each(function(sain) {
                tot += +$(this).val();
            });
            if (tot > 200) {
                var differenza = tot - 200;
                $('#_dif').val(differenza);
                for (var i=3; i>=0; i--) {
                    $.each([5, 2, 1], function(j, o) {
                        var v = o*(10**i);
                        if (differenza >= (o/100)) {
                            quanti = Math.min($('input#c'+v).val() / (v/100), Math.floor(differenza / (v/100)))
                            $('#t'+v).val(quanti);
                            console.log(v);
                            $('#d'+v).removeClass('w3-hide');
                            differenza = differenza - quanti * (v/100);
                        } else {
                            console.log(differenza);
                            console.log("nascondo " + "#d"+v);
                            $('#d'+v).addClass('w3-hide');
                        }
                    })
                }
            }
            tot = Number((tot).toFixed(2));
            $('input[id^=tot]').val(tot);

        }
    </script>
</form>
<br>
<!--
<div class="w3-theme w3-card-4 w3-round-large w3-center">
    <?php for ($i = 0; $i < 4; $i++) : ?>
        <?php foreach (array(1, 2, 5) as $value) : ?>
            <?php $value *= pow(10, $i) ?>
            <div id="d<?= $value ?>" style="height: 80px; display: inline-block; text-align: center; margin: 8px;" class="w3-padding w3-display-container w3-hide">
                <input id="t<?= $value ?>" type="number" readonly="readonly" value="0" class="w3-input w3-display-bottommiddle w3-third w3-circle w3-card-4 w3-center w3-small">
                <img src="/img/<?= $value / 100 ?>.png" height="100%"><br>
            </div>
        <?php endforeach ?>
    <?php endfor ?>
    <div class="w3-panel w3-center">
        <input id="_dif" name="dif" type="number" class="w3-input w3-card-4 w3-round-large" readonly>
    </div>
    <br>
</div>-->