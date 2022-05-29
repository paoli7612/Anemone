<?php

namespace App\Models;

use App\core\Database;
use Model;

class Merce extends Model
{
    protected static $table = 'merci';

    public static function dailyCount()
    {
        return Database::select('merce', self::class, '`categoria`=\'Impasto\' OR `categoria`=\'Bibite\'');
    }
}
