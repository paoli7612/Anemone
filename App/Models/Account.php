<?php 

namespace App\Models;

use App\core\Database;
use Model;

class Account extends Model {

    public static $table = 'accounts';

    public function complete_name()
    {
        return $this->name . " " . $this->surname;
    }

    public function set_theme($idTheme)
    {
        Database::update(static::$table, ['idTheme' => $idTheme], $this->id);
    }

}


