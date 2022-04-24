<?php use App\App; ?>

<div class="w3-row w3-center">
    <div class="w3-panel w3-theme w3-card-4 w3-round-large">
        <div class="w3-panel w3-half">
            <input type="date" class="w3-input w3-round-large w3-theme-l2" value="<?= App::today() ?>" readonly="readonly">
        </div>
    </div>
</div>

<div class="w3-panel w3-theme w3-card-4 w3-round-large">
    <form action="inventory" method="POST">
        <?php use App\Models\Goods; ?>
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

        <div class="w3-panel">

            <table class="w3-table-all w3-card-4 w3-white">
                <thead>
                    <th>Prodotto</th>
                    <th>Quantità</th>
                    <th>Stock</th>
                </thead>
                <tbody>
                    <?php foreach (Goods::dailyCount() as $prodotto) : ?>
                        <tr>
                            <td class="w3-hide"><?= $prodotto->tipo ?></td>
                            <td><?= $prodotto->nome ?></td>
                            <td>
                                <input type="number" name="<?= $prodotto->id ?>_quantita" class="w3-input w3-card w3-round-large" placeholder="x1">
                            </td>
                            <?php if ($prodotto->categoria == 'Impasto') : ?>
                                <td>
                                    <input type="number" name="<?= $prodotto->id ?>_<?= $prodotto->stock/2 ?>" class="w3-input w3-card w3-round-large" placeholder="x<?= $prodotto->stock / 2 ?>">
                                </td>
                            <?php endif ?>
                            <td colspan="2">
                                <input type="number" name="<?= $prodotto->id ?>_<?= $prodotto->stock ?>" class="w3-input w3-card w3-round-large" placeholder="x<?= $prodotto->stock ?>">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
        <script>
            var update = function() {
                $('tbody tr').each(function(i, e) {

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