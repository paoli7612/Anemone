<?php

use Model as GlobalModel;

class Model 
{

    public static $asd;

    public function foo()
    {
        echo parent::$asd;
    }
}

class Cane extends Model
{
    public static $asd = "ciao"; 
}

$c = new Cane();
echo Cane::$asd. " stronzo<br>";
$c->foo();


?>