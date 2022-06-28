<?php 

namespace App\Models;

use App\core\Database;
use Model;

class Utente extends Model {

    public static $table = 'utenti';

    public function nomeCompleto()
    {
        return $this->nome . " " . $this->cognome;
    }

    public function cambiaTema($id_tema)
    {
        Database::update(static::$table, ['id_tema' => $id_tema], $this->id);
    }

}


