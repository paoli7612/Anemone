<?php

use App\core\Auth;
use App\core\Database;
use App\core\Router;

Database::mdb('drop');
Auth::logout();
Database::mdb('create');
Database::mdb('insert');
?>

<script>
    window.location="/login";
</script>