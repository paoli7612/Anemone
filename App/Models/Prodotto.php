<?php
namespace App\Models;
use App\core\Database;
use Oggetto;

class Prodotto extends Oggetto {

    public static $table = 'prodotti';

    public static function get($id)
    {
        return Database::get($id, self::class, 'prodotti');
    }

    public static function tipi()
    {
        return array('Impasto', 'Formaggi', 'Salumi', 'Salse', 'Scatolame');
    }

    public static function byTipo($tipo)
    {
        return Database::select('prodotti', self::class, "tipo='$tipo'");
    } 

    public function merci() {
        return Database::query("SELECT merci.* FROM merci, merceProdotto WHERE merci.id=merceProdotto.id_merce AND merceProdotto.id_prodotto=" . $this->id);
    }

    public function path($action)
    {
        if ($action == null)
            return $action = 'view';
        $id = $this->id;
        return "/prodotto/$action?id=$id";
    }

    public static function categorie()
    {
        return Database::all(null, 'categorieProdotto');
    }

    public static function perCategoria()
    {
        return self::orderBy('categoria');
    }

    public static function all($max=null)
    {
        return Database::query("SELECT p.*, cp.nominativo as categoria
                                FROM prodotti p, categorieProdotto cp
                                WHERE p.id_categoria=cp.id
                                GROUP BY p.id", static::class);
    }

}