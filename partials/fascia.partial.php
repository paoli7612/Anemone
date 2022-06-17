<?php use App\App;
use App\Models\Delivery;

 ?>
<?php $delivery = Delivery::getBy('nominativo', $nominativo)[0] ?>
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

<div class="w3-panel w3-card-4 w3-round-large" style="background-color: <?= $delivery->colore ?>">
    <h1><?= $delivery->nominativo ?></h1>
</div>