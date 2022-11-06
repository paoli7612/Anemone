<?php

    use App\core\Auth;
    if (Auth::register($_POST['username'], $_POST['email'], $_POST['password']))
        header('Location: /');
    else 
        header('Location: /');