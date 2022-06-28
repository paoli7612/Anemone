<?php

use App\core\Auth;
use App\Models\Tema;

    $utente = Auth::$utente;
    if (Tema::exist($_POST['id_tema']))
        $utente->cambiaTema($_POST['id_tema']);

