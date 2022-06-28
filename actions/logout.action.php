<?php

use App\core\Auth;
use App\core\Router;

    Auth::logout();
    header('Location: /');