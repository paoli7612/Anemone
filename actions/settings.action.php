<?php

    use App\core\Auth;

    Auth::$user->update(['idTema' => $_POST['theme']]);

    header('Location: /user');