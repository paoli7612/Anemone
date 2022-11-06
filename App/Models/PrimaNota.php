<?php 
namespace App\Models;

use App\core\Router;
use Model;

class PrimaNota extends Model {

    public static $table = 'primaNota';

    public static function routes()
    {
        Router::get('primaNota');
        Router::post('primaNota');
        foreach (PrimaNota::all() as $primaNota) {
            Router::get('primaNota/' . $primaNota->data, 'primaNotaSingle');
        }
    }
};