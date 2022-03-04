<?php
namespace App\Models;
use App\core\Database;

class Product {

    public static function get($id)
    {
        return Database::get($id, self::class, 'prodotti');
    }

    public static function all()
    {
        return Database::all(self::class, 'prodotti');
    }

    public static function tipi()
    {
        return array('Impasto', 'Formaggi', 'Salumi', 'Salse', 'Scatolame');
    }

    public static function byTipo($tipo)
    {
        return Database::select('prodotti', self::class, "tipo='$tipo'");
    } 

}