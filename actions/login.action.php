<?php

    use App\core\Auth;
    if (Auth::login($_POST['username'], $_POST['password']))
        header('Location: /');
    else 
        header('Location: /login');