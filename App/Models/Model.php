<?php

use App\core\Database;

    class Model {
            
        protected static $table;
        protected static $model;

        public function update($field, $value)
        {
            Database::query("UPDATE " . $this->table . " SET $field='$value' WHERE id=".$this->id);
            return $value;
        }

        public static function updateById($id, $field, $value)
        {
            Database::query("UPDATE utenti SET $field=$value WHERE id=$id");
        }

        public static function all()
        {
            return Database::query("SELECT * FROM " . self::$table, Theme::class);
        }

        public static function get($id, $model, $table)
        {
            return Database::get($id, $model, $table);
        }
    }
?>