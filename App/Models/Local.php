<?php
namespace App\Models;
use App\core\Database;
use Locale;

class Local {

    public static function all()
    {
        return Database::query("SELECT * FROM locali", Inventory::class);
    }

    public function person()
    {
        return Person::get($this->idResponsabile);
    }

    public function persons()
    {
        return Database::query('SELECT persone.* from persone, personalocale WHERE personalocale.idPersona=persone.id and personalocale.idLocale=' . $this->id, Person::class);
    }



}