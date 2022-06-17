<?php

namespace App\Models;

use App\core\Database;
use Model;

class Delivery extends Model
{

    public static $table = 'delivery';


    public static function allDay($date)
    {
        return Database::query(
            "SELECT
                delivery.*,
                count(scontrini.id) as qta,
                SUM(scontrini.totale) as totale
            FROM delivery
                LEFT JOIN (
                    SELECT scontrini.id, scontrini.id_delivery, SUM(prodotti.prezzo) as totale
                    FROM
                        scontrini, prodottoScontrino
                        LEFT JOIN prodotti ON prodotti.id=prodottoScontrino.id_prodotto
                    WHERE DATE(scontrini.tempo)=DATE('$date')
                ) AS scontrini ON scontrini.id_delivery=delivery.id
            GROUP BY
                delivery.id",
            Inventory::class
        );
    }

    public static function deleteDay()
    {
        Database::query("DELETE FROM delivery WHERE giorno=CURRENT_DATE;");
    }

    public static function fascia()
    {
        return Database::query("SELECT SUM(totale) as totale, COUNT(ordini.id) as quanti, nominativo, colore FROM (
            SELECT SUM(prodotti.prezzo) as totale, delivery.nominativo, delivery.id, delivery.colore
            FROM `scontrini`, `prodotti`, `prodottoScontrino`, `delivery`
            WHERE `scontrini`.id=`prodottoScontrino`.id_scontrino
                AND `prodotti`.id=`prodottoScontrino`.id_prodotto
                AND `scontrini`.id_delivery=`delivery`.id
            GROUP BY scontrini.id
        ) as ordini
        GROUP BY ordini.id");
    }
}
