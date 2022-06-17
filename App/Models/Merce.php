<?php

namespace App\Models;

use Model;

class Merce extends Model
{
    protected static $table = 'merci';

    public static function dailyCount()
    {
        return Merce::where("categoria='bibite'");
    }
}
