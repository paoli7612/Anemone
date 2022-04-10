<?php
namespace App\Models;
use App\core\Database;

class Area {

    public static function all()
    {
        return  Database::all(Area::class, 'aree');
    }

    public function person()
    {
        return Person::get($this->idResponsabile);
    }
    public function locals()
    {
        return Database::select('locali', Local::class, 'idArea='.$this->id);
    }
}