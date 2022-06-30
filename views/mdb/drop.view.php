<?php

use App\core\Auth;
use App\core\Database;

    print_r(Database::mdb('drop'));
    Auth::logout();
?>