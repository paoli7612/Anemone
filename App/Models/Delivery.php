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

    public static function create($nome, $valore, $fascia)
    {
        Database::create('delivery', ['nome', 'valore', 'fascia'], [$nome, $valore, $fascia]);
    }

    public static function day($date)
    {
        return Database::query(
            "
        SELECT nome, ROUND(SUM(valore), 2) as valore, COUNT(nome) as quanti, fascia
        FROM delivery
        WHERE Date(giorno)=Date('$date')
        GROUP BY nome, fascia
        ORDER BY nome",
            Inventory::class
        );
    }

    public static function allDay($date)
    {
        return Database::query(
            "
        SELECT nome, valore, fascia
        FROM delivery
        WHERE Date(giorno)=Date('$date')",
            Inventory::class
        );
    }

    public static function deleteDay()
    {
        Database::query("DELETE FROM delivery WHERE giorno=CURRENT_DATE;");
    }
}
