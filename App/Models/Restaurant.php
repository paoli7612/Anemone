<?php
namespace App\Models;
use App\core\Database;

class Restaurant {

    public static function all()
    {
        return Database::query("SELECT * FROM locali", Inventory::class);
    }

    public function user()
    {
        return User::get($this->idResponsabile, User::class, 'utenti');
    }

    public function users()
    {
        return Database::query('SELECT utenti.* FROM utenti, utenteLocale WHERE utentelocale.idutente=utenti.id and utentelocale.idLocale=' . $this->id, User::class);
    }

    public function isClosed()
    {
        return $this->chiusura;
    }



}