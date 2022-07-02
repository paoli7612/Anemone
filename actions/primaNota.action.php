<?php

use App\Models\PrimaNota;

    print_r(array_keys($_POST));

    PrimaNota::create(array_keys($_POST), array_values($_POST));

?>

<?php foreach($_POST as $key => $value): ?>
    <div>
        
        <h1><?= $key ?></h1>
        <?= $value ?>
    </div>
    <?php endforeach ?>