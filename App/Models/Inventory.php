<?php
namespace App\Models;

use App\core\Auth;
use App\core\Database;

class Inventory {

    public static function all()
    {
        return Database::query("SELECT * FROM inventario", Inventory::class);
    }

    public static function day($date)
    {
        return Database::query("
                    SELECT SUM(inventari.quantita) as quantita, merce.nome as merce
                    FROM inventari, merce
                    WHERE inventari.idMerce=merce.id
                    GROUP BY merce.nome
                    ORDER BY merce.categoria",
                    Inventory::class);
    }

    public static function create($idMerce, $quantita, $quando)
    {
        if ($quantita > 0)
            Database::create('inventari', ['idMerce', 'idUtente', 'quantita', 'quando'], [$idMerce, Auth::$user->id, $quantita, $quando]);        
    }

    public function prodotto()
    {
        return Goods::get($this->idMerce);
    }
}