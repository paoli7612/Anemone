<?php

use App\App;
use App\Models\PrimaNota;

?>

<table class="w3-table-all">

    <?php foreach(PrimaNota::orderBy('data') as $primaNota): ?>
        <tr onclick="window.location='/primaNota/<?= $primaNota->data ?>'">
            <td><?= $primaNota->data ?></td>
        </tr>    
    <?php endforeach ?>
</table>

<form action="/primaNota" method="post" class="w3-panel w3-theme w3-padding w3-card-4 w3-theme">
    <input type="date" name="data" value="<?= App::today() ?>" class="w3-input w3-half">
    <input type="submit" value="Crea nuova" class="w3-btn w3-card-4 w3-round-large">
</form>