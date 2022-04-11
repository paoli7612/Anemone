<?php 
namespace App\Models;

use App\core\Database;
use Model;

class Person extends Model {

    public function __construct() {
        $this->table = 'persone';
    }

    public static function get($id)
    {
        return Database::get($id, self::class, 'persone');
    }

    public static function getSlug($slug)
    {
        return Database::select('persone', self::class, "slug='$slug'")[0];
    }

    public function areas() 
    {
        return Database::select('aree', Area::class, 'idResponsabile='.$this->id);
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