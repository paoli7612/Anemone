<?php

use App\core\Database;
use App\Models\Theme;

    class Model {
            
        protected static $table;

        public function update($vv)
        {
            foreach ($vv as $field => $value) {
                Database::query("UPDATE " . static::$table . " SET $field='$value' WHERE id=".$this->id);
            }
            return $value;
        }

        public static function updateById($id, $field, $value)
        {
            Database::query("UPDATE utenti SET $field=$value WHERE id=$id");
        }

        public static function all()
        {
            return Database::query("SELECT * FROM " . static::$table, static::class);
        }

        public static function get($id)
        {
            return Database::get($id, static::class, static::$table);
        }
    }
?>