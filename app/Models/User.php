<?php 
namespace App\Models;

use App\core\Database;
use Model;

class User extends Model {

    protected static $table = 'utenti';
    protected static $model = 'User';

    public function isAdmin()
    {
        return $this->id == 1;
    }

    public static function getByName($name)
    {
        Database::select('utenti', self::class, 'slug='.$name);
    }

    public static function getBySlug($slug)
    {
        return Database::select('utenti', self::class, "slug='$slug'")[0];
    }

    public function areas() 
    {
        return Area::getByIdUser($this->id);
    }

    public function name()
    {
        return $this->nome . " " . $this->cognome;
    }

    public function url()
    {
        return '/person?slug='.$this->slug;
    }

};