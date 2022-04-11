<?php 
namespace App\Models;

use App\core\Database;

class User {

    public Person $person;

    public function __construct() {
        $this->person = Person::get($this->idPersona);
    }   

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
        return $this->person->areas();
    }

    public function name()
    {
        return $this->person->name();
    }

    public static function all()
    {
        return Database::all(self::class, 'utenti');
    }

    public static function getByName($name)
    {
        Database::select('utenti', self::class, 'slug='.$name);
    }

};