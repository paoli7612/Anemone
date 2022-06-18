<?php

    $id = $_POST['id'];
    $totale = $_POST['totale'];
    $tempo = $_POST['tempo'];
    Scontrino::create(['id_delivery', 'totale', 'tempo'], [$id, $totale, $tempo]);

