<?php
namespace App\Models;
use App\core\Database;
use Model;

class Area extends Model {

    protected static $table = 'aree';

    public function user()
    {
        return User::get($this->idResponsabile, User::class, "utenti");
    }
    
    public function restaurants()
    {
        return Database::select('locali', Restaurant::class, 'idArea='.$this->id);
    }

    public static function getByIdUser($id)
    {
        return Database::select('aree', Area::class, 'idResponsabile='.$id);
    }
}