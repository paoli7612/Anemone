<?php
namespace App\Models;
use Oggetto;

class Area extends Oggetto {

    public static $table = 'aree';

    public function locali()
    {
        return Locale::where('id_area='.$this->id);
    }

    public function responsabile()
    {
        return Dipendente::get($this->id_responsabile);
    }
}