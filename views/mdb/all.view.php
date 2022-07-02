<?php

use App\core\Auth;
use App\core\Database;

if (isset($_GET['a'])) {
    Database::mdb('drop');
    Auth::logout();
    Database::mdb('create');
    Database::mdb('insert');

}

?>

<script>
    window.location="/login";
</script>