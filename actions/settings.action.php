<?php

use App\core\Auth;

    Auth::$account->update(["name" => $_POST['name'], "surname" => $_POST['surname']]);
    header("Location: /account");
?>