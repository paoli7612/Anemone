<?php

    use App\core\Auth;
    use App\Models\Theme;

    $user = Auth::$account;
    $user->cambiaTema($_POST['id_tema']);

