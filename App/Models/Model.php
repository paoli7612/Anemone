<?php

use App\core\Database;

    class Model {
            
        public function update($field, $value)
        {
            Database::query("UPDATE " . $this->table . " SET $field='$value' WHERE id=".$this->id);
            return $value;
        }

    }
?>