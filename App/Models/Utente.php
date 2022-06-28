<?php 

namespace App\Models;

use Model;

class Utente extends Model {

    public static $table = 'utenti';

    public function nomeCompleto()
    {
        return $this->nome . " " . $this->cognome;
    }

}


