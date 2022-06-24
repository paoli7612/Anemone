<?php

namespace App\Models;

use Model;

class Merce extends Model
{
    public static $table = 'merci';

    public static function dailyCount()
    {
        return Merce::where("daily='1' ORDER BY id");
    }
}
