<div class="w3-panel w3-theme w3-card-4 w3-rouund-large">

    <form action="inventory">
        <?php

        use App\Models\Product; ?>

        <div class="w3-panel w3-center">
            <div class="w3-third">
                <div class="w3-row">
                    <div class="w3-col" style="width:50px">
                        <button class="w3-button w3-white" style="border-radius: 10px 0px 0px 10px">
                            <i class="fa-solid fa-magnifying-glass-minus"></i>
                        </button>
                    </div>
                    <div class="w3-rest">
                        <input style="border-radius: 0 10px 10px 0" id="search" type="text" class=" w3-input w3-round-large w3-card w3-right" placeholder="cerca tipo...">
                    </div>
                </div>
            </div>
            <div class="w3-third w3-padding">
                <label>
                    Inseriti <input type="checkbox" class="w3-check" id="ins" checked="checked">
                </label>
            </div>
            <div class="w3-third w3-padding">
                <label>
                    Mancanti <input type="checkbox" class="w3-check" id="manc" checked="checked">
                </label>
            </div>
        </div>

        <div class="w3-panel">

            <table class="w3-table-all w3-card-4 w3-white">
                <thead>
                    <td>Tipo</td>
                    <td>Prodotto</td>
                    <td>Quantità</td>
                </thead>
                <tbody>
                    <?php foreach (Product::all() as $prodotto) : ?>
                        <tr>
                            <td><?= $prodotto->tipo ?></td>
                            <td value="<?= $prodotto->id ?>"><?= $prodotto->nome ?></td>
                            <td width="200px">
                                <input type="number" name="" id="" class="w3-input w3-card w3-round-large">
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>
        <script>
            $(document).ready(function() {
                $('tbody input').on('keyup', function() {
                    if ($(this).val())
                        $(this).parent().parent().addClass('w3-theme-l2');
                    else
                        $(this).parent().parent().removeClass('w3-theme-l2');
                });
                $("#search").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("table tbody tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
                $('#ins').on("change", function() {
                    var s = $(this).is(':checked');
                    $("table tbody tr").filter(function() {
                        if ($(this).hasClass('w3-theme-l2'))
                            $(this).toggle(s);
                    });
                });
                $('#manc').on("change", function() {
                    var s = $(this).is(':checked');
                    $("table tbody tr").filter(function() {
                        if (!$(this).hasClass('w3-theme-l2'))
                            $(this).toggle(s);
                    });
                });
            });
        </script>



    </form>

</div>