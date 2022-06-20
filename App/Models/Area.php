<?php
namespace App\Models;
use Model;

class Area extends Model {

    protected static $table = 'aree';

    public function locali()
    {
        return Locale::where('id_area='.$this->id);
    }

    public function responsabile()
    {
        return Dipendente::get($this->id_responsabile);
    }
}