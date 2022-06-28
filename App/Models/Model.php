<?php

use App\core\Database;

    class Model {
            
        public static $table;

        public static function all($max=null)
        {
            return Database::all(static::class, static::$table, $max);
        }

        public static function get($id)
        {
            return Database::get($id, static::class, static::$table);
        }
        
        public static function getBy($key, $value)
        {
            return Database::select(static::$table, static::class, "$key='$value'")[0];
        }

        public static function create($keys, $values)
        {
            Database::create(static::$table, $keys, $values);
        }

        public static function where($w)
        {
            return Database::select(static::$table, static::class, $w);
        }
        
        public static function delete($id)
        {
            Database::delete(static::$table, "id=$id");
        }

        public function remove()
        {
            static::delete("id={$this->id}");
        }
    
        public static function orderBy($col)
        {
            return Database::query("SELECT * FROM prodotti ORDER BY $col");
        }

        public function url()
        {
            return static::$table . "/" . $this->slug;
        }

    }
?>