<?php

use App\core\Auth;
use App\Models\User;

    User::update(Auth::$user->id, 'idTema', $_POST['theme']);

    header('Location: /settings');