<?php
namespace App\Models;
use App\core\Database;

class Inventory {

    public static function all()
    {
        return Database::query("SELECT * FROM inventario", Inventory::class);
    }

    public static function day($date)
    {
        return Database::query("
                    SELECT SUM(inventario.numero) as numero, prodotti.nome, prodotti.tipo
                    FROM inventario, prodotti
                    WHERE Date(inventario.quando)=Date('$date')
                        AND inventario.idProdotto=prodotti.id
                    GROUP BY prodotti.nome
                    ORDER BY prodotti.tipo",
                    Inventory::class);
    }

    public static function create()
    {
        Database::create('inventario', ['idProdotto', 'idUtente', 'numero'], ['1', '1', '1']);        
    }
}