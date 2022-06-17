<?php use App\App; ?>

<div class="w3-panel w3-theme w3-card-4 w3-round-large w3-padding">
    <input type="date" class="w3-input w3-round-large w3-theme-l2 w3-col m10" value="<?= App::today() ?>" readonly="readonly">
</div>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <form action="inventory/dailyCount" method="POST">
        <?php use App\Models\Merce; ?>
        <div class="w3-panel w3-center">
            <div class="w3-row">
                <div class="w3-col" style="width:50px">
                    <button type="button" class="w3-button w3-white" style="border-radius: 10px 0px 0px 10px" onclick="$('#search').val(''); update()">
                        <i class="fa-solid fa-magnifying-glass-minus"></i>
                    </button>
                </div>
                <div class="w3-rest">
                    <input style="border-radius: 0 10px 10px 0" id="search" type="text" class=" w3-input w3-round-large w3-card w3-right" placeholder="cerca...">
                </div>
            </div>
        </div>
        <div class="w3-panel w3-white w3-topbar w3-bottombar">
            <?php foreach (Merce::dailyCount() as $merce) : ?>
                <div class="w3-row w3-container">
                    <div class="w3-col m4 s4">
                        <div class="w3-right w3-hide-small">
                            <img src="/img/merce/<?= $merce->img ?>" alt="<?= $merce->nominativo ?>" height="70px">
                        </div>
                        <div class="w3-center">
                            <?= $merce->nominativo ?>
                        </div>
                        <div class="w3-center">
                            <b>0</b>
                        </div>
                    </div>
                    <div class="w3-col m4 s4">
                        <div class="w3-panel">
                            <input type="number" name="<?= $merce->id ?>_quantita" class="w3-input w3-card w3-round-large" placeholder="x1" onkeyup="update()">
                        </div>
                    </div>
                    <div class="w3-col m4 s4">
                        <div class="w3-panel">
                            <input type="number" name="<?= $merce->id ?>_<?= $merce->stock ?>" class="w3-input w3-card w3-round-large" placeholder="x<?= $merce->stock ?>" onkeyup="update()">
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
            </table>
        </div>
        <script>
            var update = function() {
                $('div.w3-row').each(function(i, e) {
                    console.log('asd');
                    var empty = true;
                    $(this).find('input').each((i, e) => {
                        if (e.value > 0) {
                            $(this).addClass('w3-theme-l2');
                            empty = false;
                        }
                    });
                    if (empty)
                        $(this).removeClass('w3-theme-l2');
                });
                var value = $("#search").val().toLowerCase();
                $("table tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            }

            $(document).ready(function() {
                $('tbody input').on('keyup', update);
                $("#search").on('keyup', update);
                $('input').on("change", update);
            });
        </script>


        <div class="w3-center w3-panel">
            <button type="submit" class="w3-button w3-xxlarge w3-card-4 w3-white w3-round-large">
                Salva
                <i class="fa-solid fa-floppy-disk"></i>
            </button>
        </div>
    </form>
</div>