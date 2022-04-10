<?php 
namespace App\Models;

use App\core\Database;

class User {

    public static function get($id)
    {
        return Database::get($id, self::class, 'utenti');
    }

    public static function update($id, $field, $value)
    {
        Database::query("UPDATE utenti SET $field=$value WHERE id=$id");
    }

    public function isAdmin()
    {
        return $this->id == 1;
    }
    public function areas() 
    {
        return Area::all();
    }

    public function name()
    {
        return $this->nome . " " . $this->cognome;
    }
};