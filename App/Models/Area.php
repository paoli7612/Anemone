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
    public function restaurants()
    {
        return Database::select('locali', Restaurant::class, 'idArea='.$this->id);
    }
}