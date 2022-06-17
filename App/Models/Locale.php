<?php
namespace App\Models;
use App\core\Database;
use Model;

class Locale extends Model {

    protected static $table = 'locali';

    public function dipendente()
    {
        return Dipendente::get($this->idResponsabile);
    }

    public function users()
    {
        // no

        return Database::query('SELECT utenti.* FROM utenti, utenteLocale WHERE utentelocale.idutente=utenti.id and utentelocale.idLocale=' . $this->id, User::class);
    }

    public function isClosed()
    {
        return $this->chiusura;
    }
    public function responsabile()
    {
        return Dipendente::get($this->id_responsabile);
    }
}