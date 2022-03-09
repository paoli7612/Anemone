<form action="delivery" method="post">

    <div class="w3-panel w3-theme w3-round-large ">
        <div class="w3-panel w3-center w3-large">
            <div class="w3-third">Valore</div>
            <div class="w3-third">Quantità</div>
            <div class="w3-third">Totale</div>
        </div>
        <?php for ($i = 0; $i < 4; $i++) : ?>
            <?php foreach (array(1, 2, 5) as $value) : ?>
                <?php $value *= pow(10, $i) ?>
                <div class="w3-panel">
                    <div class="w3-third w3-container w3-center">
                        <?php if ($value < 100) : ?>
                            <?= $value ?> cent
                        <?php else : ?>
                            <?= $value / 100 ?> €
                        <?php endif ?>
                    </div>
                    <div class="w3-third w3-container">
                        <input type="number" class="w3-input w3-round-large" placeholder="Quantità">
                    </div>
                    <div class="w3-third w3-container">
                        <input type="number" name="c<?= $value ?>" class="w3-input w3-round-large w3-block w3-light-grey" placeholder="Totale" readonly>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endfor ?>
    </div>

    <div class="w3-center">
        <button type="submit" class="w3-button w3-xxlarge w3-card-4 w3-green">
            Salva
            <i class="fa-solid fa-floppy-disk"></i>
        </button>
    </div>

</form>