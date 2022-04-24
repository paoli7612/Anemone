<?php

namespace App\Models;

use App\core\Database;
use Model;

class Goods extends Model
{
    protected static $table = 'merce';

    public static function dailyCount()
    {
        return Database::select('merce', self::class, '`categoria`=\'Impasto\' OR `categoria`=\'Bibite\'');
    }
}
