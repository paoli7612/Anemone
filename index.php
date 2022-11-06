<?php

    use App\App;

    require_once 'vendor/autoload.php';

    if ($_SERVER['SERVER_NAME'] == 'localhost')
        App::main('localhost');
    else
        App::main('Ovh');