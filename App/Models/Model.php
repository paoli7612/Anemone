<?php

use App\core\Database;

    class Model {
            
        protected static $table;

        public function update($vv)
        {
            foreach ($vv as $field => $value) {
                Database::query("UPDATE " . static::$table . " SET $field='$value' WHERE id=".$this->id);
            }
            return $value;
        }

        public static function edit($id, $vv)
        {
            self::get($id)->update($vv);
        }

        public static function updateById($id, $field, $value)
        {
            Database::query("UPDATE utenti SET $field=$value WHERE id=$id");
        }

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

        public static function deleteAll()
        {
            Database::deleteAll(static::$table);
        }

        public function remove()
        {
            Database::delete(static::$table, "id={$this->id}");
        }
    
        public static function orderBy($col)
        {
            return Database::query("SELECT * FROM prodotti ORDER BY $col");
        }

    }
?>