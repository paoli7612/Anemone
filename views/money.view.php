<form action="delivery" method="post">

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
                        <input min="0" type="number" class="w3-input w3-round-large" placeholder="Quantità" onkeyup="$('#c<?= $value ?>').val(($(this).val()*<?= $value ?>)/100); update()">
                    </div>
                    <input type="number" id="c<?= $value ?>" class="w3-hide" placeholder="€" readonly>
                </div>
            <?php endforeach ?>
        <?php endfor ?>
        <div class="w3-panel w3-center">
            <input id="tot" name="tot" type="number" class="w3-input w3-card-4 w3-round-large">
        </div>
    </div>
    <script>
        var update = () => {
            let tot = 0;
            $('input[id^=c]').each(function(sain) {
                tot+=+$(this).val();
            });
            tot = Number((tot).toFixed(2)); // 6.7
            $('input[id^=tot]').val(tot);
        }
    </script>

</form>