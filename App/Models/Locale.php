<?php
namespace App\Models;
use App\core\Database;
use Oggetto;

class Locale extends Oggetto {

    public static $table = 'locali';

    public function dipendente()
    {
        return Dipendente::get($this->idResponsabile);
    }

    public function dipendenti()
    {
        return Database::query("SELECT dipendenti.* FROM dipendenti, dipendenteLocale
                WHERE dipendenti.id=dipendenteLocale.id_dipendente
                    AND dipendenteLocale.id_locale={$this->id}", Dipendente::class);
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