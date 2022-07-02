<?php

use App\core\Database;

    class Scontrino extends Model {
            
        public static $table = 'scontrini';

        public static function delivery($id_delivery, $date)
        {
            return Database::query("
                SELECT carta, contante,
                    CASE
                        WHEN tempo <= '$date 15:00:00' THEN 1
                        WHEN tempo <= '$date 18:00:00' THEN 2
                        ELSE 3
                    END AS fascia
                FROM scontrini
                WHERE id_delivery=$id_delivery
                ORDER BY fascia    
            ", self::class);
        }

    }

    
?>