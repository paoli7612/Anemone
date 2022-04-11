<?php

use App\core\Auth;
use App\Models\Person;

    if (Auth::check() && isset($_POST['slug']))
    {
        $person = Auth::$user->person;
        $person->update('slug', $_POST['slug']);
        header("Location: /person");
    }

?>
