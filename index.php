<?php

    use App\App;

    require_once 'vendor/autoload.php';

    if ($_SERVER['SERVER_NAME'] == 'anemone.altervista.org')
        App::main('Altervista');
    else
        App::main('Php');