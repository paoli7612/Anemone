<?php

    $id = $_POST['id'];
    $totale = $_POST['totale'];
    $tempo = $_POST['tempo'];
    $pagamento = $_POST['pagamento'];
    Scontrino::create(['id_delivery', $pagamento, 'tempo'], [$id, $totale, $tempo]);

