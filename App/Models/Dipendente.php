<?php 
namespace App\Models;
use Model;

class Dipendente extends Model {

    public static $table = 'dipendenti';

    public function __construct() {
        $this->id_tema = 2;
    }

    public function isAdmin()
    {
        return $this->id == 1;
    }

    public static function getBySlug($slug)
    {
        return Dipendente::getBy('slug', $slug)[0];
    }

    public function areas() 
    {
        return Area::where('id_responsabile', $this->id);
    }

    public function nomeCompleto()
    {
        return $this->nome . " " . $this->cognome;
    }

    public function url()
    {
        return '/dipendente?slug='.$this->slug;
    }

};