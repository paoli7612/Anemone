<?php 
namespace App\Models;

use App\core\Database;

class Person {

    public static function get($id)
    {
        return Database::get($id, self::class, 'persone');
    }

    public function areas() 
    {
        return Database::all(Area::class, 'aree');
    }

    public function name()
    {
        return $this->nome . " " . $this->cognome;
    }

    public static function where($where)
    {
        return Database::select('persons', Person::class, $where);
    }

};