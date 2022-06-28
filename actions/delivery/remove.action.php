<?php

use App\App;

    $totale = $_POST['totale'];
    $fascia = $_POST['fascia'];
    $date = App::today();
    if ($fascia == 1) {
        $scontrino = Scontrino::where("totale=$totale AND tempo <= '$date 15:00:00'");
    } else if ($fascia == 2) {
        $scontrino = Scontrino::where("totale=$totale AND tempo <= '$date 18:00:00'");
    } else {
        $scontrino = Scontrino::where("totale=$totale");
    }
    $scontrino[0]->remove();
