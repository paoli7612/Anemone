<?php
namespace App\Models;
use App\core\Database;

class Theme {

    public static function all()
    {
        return Database::query("SELECT * FROM temi", Theme::class);
    }

}