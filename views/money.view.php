<div class="w3-display-container" style="position: relative">
<br>
<br>
<br>
    <div class="w3-display-topmiddle w3-padding" style="position: fixed; top: 40px">
        <div class="w3-panel w3-padding w3-theme w3-card-4 w3-round-large">
            <input id="tot" name="tot" type="number" class="w3-input w3-card-4 w3-round-large" readonly>
        </div>
    </div>
    <form action="money" method="post">
        <div class="w3-theme w3-round-large" style="padding-top: 4px; padding-bottom: 4px">
            <div class="w3-panel w3-center w3-large">
            </div>
            <?php for ($i = 0; $i < 4; $i++) : ?>
                <?php foreach (array(1, 2, 5) as $value) : ?>
                    <?php $value *= pow(10, $i) ?>
                    <div class="w3-panel w3-row">
                        <div class="w3-col w3-center" style="width: 90px; margin-right:16px">
                            <img src="/img/<?= $value / 100 ?>.png" height="50px">
                        </div>
                        <div class="w3-col w3-right w3-center w3-small" style="width: 40%">
                            <button type="button" class="w3-button w3-card w3-circle w3-theme-l2" onclick="var i=$(this).parent().parent().find('input').first(); i.val(+i.val()+1); i.keyup()">
                                <i class="fa fa-plus"></i>
                            </button>
                            <button type="button" class="w3-button w3-card w3-circle w3-theme-l2" onclick="var i=$(this).parent().parent().find('input').first(); i.val(+i.val()-1); i.keyup()">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="w3-button w3-card w3-circle w3-theme-l2" onclick="var i=$(this).parent().parent().find('input').first(); i.val(0); i.keyup()">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                        <div class="w3-rest">
                            <input step="1" min="0" type="number" class="w3-input w3-round-large" placeholder="Quantità" onkeyup="$('#c<?= $value ?>').val(($(this).val()*<?= $value ?>)/100); update()">
                        </div>
                        <input type="number" id="c<?= $value ?>" class="w3-hide" placeholder="€" readonly>
                    </div>
                <?php endforeach ?>
            <?php endfor ?>
            <?php foreach ([1, 2, 3, 4, 5, 6] as $i) : ?>
                <div class="w3-panel w3-row">
                    <div class="w3-col w3-center" style="width: 90px; margin-right:16px">
                        <img src="/img/moneta.jpg" height="50px">
                    </div>
                    <div class="w3-rest">
                        <input min="0" type="number" class="w3-input w3-round-large" placeholder="€" onkeyup="$('#cMoneta<?= $i ?>').val($(this).val()); update()">
                    </div>
                    <input type="number" id="cMoneta<?= $i ?>" class="w3-hide" placeholder="" readonly>
                </div>
            <?php endforeach ?>
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
                    for (var i = 3; i >= 0; i--) {
                        $.each([5, 2, 1], function(j, o) {
                            var v = o * (10 ** i);
                            if (differenza >= (o / 100)) {
                                quanti = Math.min($('input#c' + v).val() / (v / 100), Math.floor(differenza / (v / 100)))
                                $('#t' + v).val(quanti);
                                console.log(v);
                                $('#d' + v).removeClass('w3-hide');
                                differenza = differenza - quanti * (v / 100);
                            } else {
                                console.log(differenza);
                                console.log("nascondo " + "#d" + v);
                                $('#d' + v).addClass('w3-hide');
                            }
                        })
                    }
                }
                tot = Number((tot).toFixed(2));
                $('input[id^=tot]').val(tot);

            }
        </script>
    </form>
</div>