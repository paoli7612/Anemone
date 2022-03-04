<?php

namespace App\Models;

use App\core\Auth;
use App\core\Database;

class Delivery
{

    public static function all()
    {
        return Database::query("SELECT * FROM inventario", Delivery::class);
    }

    public static function create($nome, $prezzo)
    {
        Database::create('delivery', ['nome', 'prezzo', 'idUtente'], [$nome, $prezzo, Auth::id()]);
    }

    public static function day($date)
    {
        return Database::query(
            "
        SELECT nome, ROUND(SUM(prezzo), 2) as prezzo, COUNT(nome) as quanti
        FROM delivery
        WHERE Date(quando)=Date('$date')
        GROUP BY nome
        ORDER BY nome",
            Inventory::class
        );
    }
}
