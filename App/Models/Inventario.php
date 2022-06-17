<?php
namespace App\Models;

use App\core\Auth;
use App\core\Database;
use Model;

class Inventory extends Model {

    public static $table = 'inventari';

    public static function day($date)
    {
        return Database::query("
            SELECT SUM(qta) as qta, merci.nominativo as nominativo
            FROM inventari, merci
            WHERE Date(tempo)=Date('$date')
            GROUP BY merci.nominativo",
            Inventory::class);
    }
    
    public function merce()
    {
        return Merce::get($this->idMerce);
    }
}